<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table("cities")->insert([
            [
                "city"=>"Hà Nội",
                "lat"=>"10.8167",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hồ Chí Minh",
                "lat"=>"21.0245",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"An Giang",
                "lat"=>"20.8000",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bà Rịa - Vũng Tàu",
                "lat"=>"10.0333",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bạc Liêu",
                "lat"=>"10.9575",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bắc Giang",
                "lat"=>"16.0600",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bắc Ninh",
                "lat"=>"21.1861",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bắc Kạn",
                "lat"=>"20.9411",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bến Tre",
                "lat"=>"18.6733",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bình Dương",
                "lat"=>"16.4667",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bình Định",
                "lat"=>"19.8075",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bình Phước",
                "lat"=>"12.2500",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Bình Thuận",
                "lat"=>"20.4200",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Cao Bằng",
                "lat"=>"12.6667",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Cà Mau",
                "lat"=>"21.6000",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Cần Thơ",
                "lat"=>"10.4042",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hải Phòng",
                "lat"=>"9.1833",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Đà Nẵng",
                "lat"=>"13.7765",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Gia Lai",
                "lat"=>"9.6000",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hòa Bình",
                "lat"=>"10.3686",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hà Giang",
                "lat"=>"21.3228",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hà Nam",
                "lat"=>"20.4461",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hà Tĩnh",
                "lat"=>"15.1206",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hưng Yên",
                "lat"=>"11.9304",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hải Dương",
                "lat"=>"10.0125",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Hậu Giang",
                "lat"=>"11.0042",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Điện Biên",
                "lat"=>"13.0875",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Đắk Lắk",
                "lat"=>"9.2833",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Đắk Nông",
                "lat"=>"10.3105",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Đồng Nai",
                "lat"=>"10.9375",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Đồng Tháp",
                "lat"=>"21.1382",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Khánh Hòa",
                "lat"=>"11.5643",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Kiên Giang",
                "lat"=>"20.9500",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Kon Tum",
                "lat"=>"18.3428",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Lai Châu",
                "lat"=>"17.4833",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Long An",
                "lat"=>"10.7000",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Lào Cai",
                "lat"=>"21.0071",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Lâm Đồng",
                "lat"=>"10.4603",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Lạng Sơn",
                "lat"=>"21.8478",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Lạng Sơn",
                "lat"=>"11.9020",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Nam Định",
                "lat"=>"13.9833",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Nghệ An",
                "lat"=>"10.5322",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Ninh Bình",
                "lat"=>"9.9369",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Ninh Thuận",
                "lat"=>"20.2539",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Phú Thọ",
                "lat"=>"11.3131",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Phú Yên",
                "lat"=>"11.9136",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Quảng Bình",
                "lat"=>"10.3500",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Quảng Nam",
                "lat"=>"15.8733",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Quảng Ngãi",
                "lat"=>"20.8172",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Quảng Ninh",
                "lat"=>"10.2550",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Quảng Trị",
                "lat"=>"9.7833",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Sóc Trăng",
                "lat"=>"21.7000",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Sơn La",
                "lat"=>"16.7504",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Thanh Hóa",
                "lat"=>"10.2289",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Thái Bình",
                "lat"=>"22.4194",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Thái Nguyên",
                "lat"=>"10.2333",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Thừa Thiên - Huế",
                "lat"=>"21.2731",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Tiền Giang",
                "lat"=>"22.6731",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Tuyên Quang",
                "lat"=>"11.6504",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Tây Ninh",
                "lat"=>"22.8233",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Vĩnh Long",
                "lat"=>"21.8288",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Vĩnh Phúc",
                "lat"=>"19.3333",
                "country"=>"Vietnam",
            ],
            [
                "city"=>"Yên Bái",
                "lat"=>"16.8056",
                "country"=>"Vietnam",
            ],
        ]);
    }
}
