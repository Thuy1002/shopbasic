<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\Table\Table;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    for ($i = 1; $i < 5; $i++) {
      $nguoidung[$i] = [
        'name' => "Đặng Thanh Thùy",
        'email' => 'thuy' . $i . '@gmail.com',
        // 'status' => 'thuy'.$i.'@gmail.com',
        'password' => Hash::make('123456'),
        'status' => random_int(0,1),
        "created_at" => date("y-m-d H:i:s"),
        "updated_at" => date("y-m-d H:i:s"),
      ];
      $discount[$i] = [
        'title' => "Deal.$i",
        'code' => 'AB' . $i . 'SEV',
        'discount' =>random_int(0,20),
        // 'expiration_date' => random_int(0,1),
        "created_at" => date("y-m-d H:i:s"),
        "updated_at" => date("y-m-d H:i:s"),
      ];
      $cate[$i] = [
        'title' => "Danh mục.$i",
        "created_at" => date("y-m-d H:i:s"),
        "updated_at" => date("y-m-d H:i:s"),
      ];
     
      // $sanpham[$i] = [
      //   'title' => "Iphone 1" . $i,
      //   'price' => 20000,
      //   'id_categories' => 1,
      //   'quantity' => 2,
      //   'img' => "product1.jpg",
      //   'mo_ta' => "xịn ",
      //   "created_at" => date("y-m-d H:i:s"),
      //   "updated_at" => date("y-m-d H:i:s"),

      // ];
      // $khachhang[$i] = [
      //   'ten_kh' => "Abc" . $i,
      //   'email' => 'abc' . $i . '@gmail.com',
      //   'dia_chi' => 'Hà Nội',
      //   "created_at" => date("y-m-d H:i:s"),
      //   "updated_at" => date("y-m-d H:i:s"),

      // ];
      // $khuyenmai[$i] = [
      //   'ten_km' => "Giảm giá mạnh",
      //   'code_km' => "abc123",
      //   "created_at" => date("y-m-d H:i:s"),
      //   "updated_at" => date("y-m-d H:i:s"),
      // ];

      // $giohang[$i] = [
      //   'ten_kh' => "Đặng Thanh Thùy",
      //   'email' => 'thuy' . $i . '@gmail.com',
      //   'dia_chi' => "Hà Nội",
      //   'title' => "Iphone 1",
      //   'price' => 20000,
      //   'img' => "product1.jpg",
      //   'mo_ta' => "xịn ",
      //   "created_at" => date("y-m-d H:i:s"),
      //   "updated_at" => date("y-m-d H:i:s"),
      // ];
    //   $cthoadon[$i] = [
    //     'id_sanpham' => "Đặng Thanh Thùy",
    //     'ten_kh' => "Đặng Thanh Thùy",
    //     'email' => 'thuy' . $i . '@gmail.com',
    //     'dia_chi' => "Hà Nội",
    //     'title' => "Iphone 1",
    //     'price' => 20000,
    //     'img' => "product1.jpg",
    //     'mo_ta' => "xịn ",
    //     'tong_tien' => 20000,
    //     "created_at" => date("y-m-d H:i:s"),
    //     "updated_at" => date("y-m-d H:i:s"),
    //   ];
    // }
    // for ($i = 1; $i < 4; $i++) {
    //   $banner[$i] = [
    //     'title' => "Iphone" . $i,
    //     'img' => "banner1.png",
    //     "created_at" => date("y-m-d H:i:s"),
    //     "updated_at" => date("y-m-d H:i:s"),
    //   ];
    // }
    // for ($i = 1; $i < 4; $i++) {
    //   $danhmuc[$i] = [
    //     'title' => "Iphone",
    //     "created_at" => date("y-m-d H:i:s"),
    //     "updated_at" => date("y-m-d H:i:s"),

    //   ];
    }
    DB::table('users')->insert($nguoidung);
    DB::table('discount')->insert($discount);
    DB::table('categories')->insert($cate);
  
  }
}
