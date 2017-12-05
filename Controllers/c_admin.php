<?php
if (!isset($_SESSION))
session_start();
require "../Models/m_admin.php";
class c_Admin{
            function theloai(){
                $m_admin = new m_Admin();
                $TL = $m_admin->getTL();
                return array("TLoai"=>$TL);
            }

            // function loaiSP(){
            //     $m_admin = new m_Admin();
            //     $loaiSP = $m_admin->getloaiSP();
            //     return array("LoaiSP"=>$loaiSP);
            // }

            function SanPham(){
                $m_admin = new m_Admin();
                $SP = $m_admin->getSP();
                return array("SPham"=>$SP);
            }

            function themTheLoai($tenTL,$tomtat){
                $m_admin = new m_Admin();
                $themTL = $m_admin->themTL($tenTL,$tomtat);
            }
            
            // chua su dung
            function xoaTheLoai($idTL){
                $m_admin = new m_Admin();
                $xoaTL = $m_admin->xoaTL($idTL);
              
               //return array("xoaTL"=>$xoaTL);
            }
            function DanhMuc_ID($idDM){
                $m_admin = new m_Admin();
                $theloai_ID = $m_admin->DanhMuc_ID($idDM);
                return array("danhmuc"=>$theloai_ID);
            }
            function suaDM($idDM,$tenDM,$tomtat){
                $m_admin = new m_Admin();
                $suaTL = $m_admin->suaDM1($idDM,$tenDM,$tomtat);
            }

            // LOAI SAN PHAM

            function stripUnicode($str){
                if(!$str) return false;
                 $unicode = array(
                    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
                    'd'=>'đ',
                    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                    'i'=>'í|ì|ỉ|ĩ|ị',
                    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                    'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
                 );
              foreach($unicode as $khongdau=>$codau){ 
              $arr = explode("|",$codau);
              $str = str_replace($arr,$khongdau,$str);
              }
              return $str;
              }
              
              function changeTitle($str)
              {
                  $str = trim($str);
                  if($str=="") return "";
                  $str = str_replace('""','',$str);
                  $str = str_replace("''",'',$str);
                  $str = $this->stripUnicode($str);
                  $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
                  
                  $str = str_replace(' ','-',$str);
                  return $str;
              }


            function themSP($tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat){
                $m_admin = new m_Admin();
                $themSP = $m_admin->themSP($tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat);
            }

            function sp_ID($idSP){
                $m_admin  = new m_Admin();
                $sp = $m_admin->sp_ID($idSP);
                return array("sp"=>$sp);
            }
            function suaSP_ID($idSP,$tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat)
            {
                $m_admin = new m_Admin();
               // $tenkhongdau = $this->changeTitle($tenSP);
                $suaSP = $m_admin->suaSP_ID($idSP,$tenSP,$mota,$hinh,$dongia,$soluongton,$madanhmuc,$manhacungcap,$tomtat);
            }
            function dangnhapad($username,$password)
        {
            $m_user = new m_Admin();
            $user = $m_user->dangnhapadmin($username,$password);
            //var_dump($user); die;
            if($user == true)
            {
              //$_SESSION["dadangnhap"]=1;
              $_SESSION["id_user"] = $user->MaAdmin;
              $_SESSION['user_name'] = $user->HoTen;
              header('location:index.php');
              exit;
              if(isset($_SESSION['ad_error']))
              {
                unset($_SESSION['ad_error']);
              }
            }
            else
            {
              $_SESSION['ad_error'] = "Đăng nhập không thành công!";
              header('location:login.php');
            }
          }

    }
