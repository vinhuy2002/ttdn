<?php

namespace App\Http\Controllers;

use App\Models\Crawler as ModelsCrawler;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler as DomCrawlerCrawler;
use Weidner\Goutte\GoutteFacade;

class Crawler extends Controller
{
    public function store($data, $link)
    {
        if (session()->get(key: 'dangnhap')) {

            ModelsCrawler::firstOrCreate([
                "id_nguoi_dung" => session()->get(key: 'id_dang_nhap'),
                "link_bai_bao" => $link,
                "tieu_de" => $data[1],
                "noi_dung" => json_encode($data[2]),
            ]);
            $idbao = ModelsCrawler::where([
                'id_nguoi_dung' => session()->get(key: 'id_dang_nhap'), "link_bai_bao" => $link, "tieu_de" => $data[1],
                "noi_dung" => json_encode($data[2]),
            ])->value('id_bao');
            $i = 0;
            $imgpath = array();
            foreach ($data[3] as $item) {
                if ($item != null) {
                    $i++;
                    $name = "id-" . session('id_dang_nhap') . "-idbao-" . $idbao . "h" . $i . ".jpg";
                    Storage::disk('public')->put($name, file_get_contents($item));
                    array_push($imgpath, "http://127.0.0.1:8080/images/" . $name);
                }
            }
            ModelsCrawler::where([
                'id_nguoi_dung' => session()->get(key: 'id_dang_nhap'), "link_bai_bao" => $link, "tieu_de" => $data[1],
                "noi_dung" => json_encode($data[2]),
            ])->update(['hinh_anh' => json_encode($imgpath)]);
            return redirect(url()->current());
        }
    }

    public function crawler(Request $request)
    {
        $link = $request->linkURL;
        if (str_contains($link, "vnexpress.net")) {
            $data = $this->vnexpressCrawl($link);
            $this->store($data, $link);
            return view('index', ["link" => $link, "tieuDe" => $data[1], "noiDung" => $data[2], "hinhAnh" => $data[3]]);
        }
        if (str_contains($link, "dantri.com.vn")) {
            $data = $this->dantriCrawl($link);
            $this->store($data, $link);
            return view('index', ["link" => $link, "tieuDe" => $data[1], "noiDung" => $data[2], "hinhAnh" => $data[3]]);
        }
        return view('index');
    }

    public function crawlCat(Request $request){
        $crawler = GoutteFacade::request('GET', $request->linkURL);
        $linkBao = $crawler->filter('h3.title-news a')->each(function ($node){
            return $node->attr("href");
        });
        $arr = array_slice($linkBao, 0, $request->noBao);
        return view('theloai', ['arr' => $arr, "link"=> $request->linkURL]);
    }

    public function crawlCatStore(Request $request){
        // return redirect('/');
        $links = $request->link;
        foreach ($links as $link){
            if (!empty($link)){
            $data = $this->vnexpressCrawl($link);
            $this->store($data, $link);
            }
        }
        return redirect("/");
    }

    public function vnexpressCrawl($link)
    {
        $crawler = GoutteFacade::request('GET', $link);
        $tieuDe = $crawler->filter('section.section.page-detail.top-detail')->each(
            function ($node) {
                return $node->filter('h1.title-detail')->text();
            }
        )[0];
        $noiDung = $crawler->filter('section.section.page-detail.top-detail p.Normal')->each(
            function ($node) {
                return $node->text();
            }
        );
        // section.section.page-detail.top-detail figure.tplCaption.action_thumb_added div.fig-picture picture
        $hinhAnh = $crawler->filter("img")->each(
            function ($node) {
                return $node->attr("data-src");
            }
        );
        // dd($hinhAnh);
        // return view('index', ["link" => $link, "tieuDe" => $tieuDe, "noiDung" => $tieuDe, "hinhAnh" => $hinhAnh]);
        return array($link, $tieuDe, $noiDung, $hinhAnh);
    }

    public function dantriCrawl($link)
    {
        $crawler = GoutteFacade::request('GET', $link);
        $tieuDe = $crawler->filter('main.body.container div.grid-container article.singular-container')->each(
            function ($node) {
                return $node->filter('h1.title-page.detail')->text();
            }
        )[0];
        $noiDung = $crawler->filter('main.body.container div.grid-container article.singular-container div.singular-content p')->each(
            function ($node) {
                return $node->text();
            }
        );
        $hinhAnh = $crawler->filter('main.body.container div.grid-container article.singular-container div.singular-content figure.image.align-center img')->each(
            function ($node) {
                return $node->attr("src");
            }
        );
        return array($link, $tieuDe, $noiDung, $hinhAnh);
    }
}
