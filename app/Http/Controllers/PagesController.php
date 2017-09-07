<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Mail\Contact;

class PagesController extends Controller
{

  public function home()
  {

    return view('home', [

      'is_page_active' => $this::isPageActive('home'),
      'page_title' => 'Home'

    ]);

  }

  public function about()
  {

    return view('about', [

      'is_page_active' => $this::isPageActive('about'),
      'page_title' => 'About'

    ]);

  }

  public function faq()
  {

    return view('faq', [

      'is_page_active' => $this::isPageActive('faq'),
      'page_title' => 'FAQ'

    ]);

  }

  public function contact($success = false)
  {


    return view('contact', [

      'is_page_active' => $this::isPageActive('contact'),
      'page_title' => 'contact',
      'success' => $success

    ]);

  }

  public function sendContactMail()
  {

    $this->validate(request(), [
      'name' => 'required',
      'email' => 'required',
      'inquiry' => 'required'
    ]);

    \Mail::to('info@repairing.center')->send(new Contact( request()->all() ));

    return redirect('/contact/success');

  }

  public function track()
  {

    return view('track', [

      'is_page_active' => $this::isPageActive('track'),
      'page_title' => 'Track Device'

    ]);

  }

  //methods

  public static function isPageActive($page)
  {

    $pages = [

      'home' => false,
      'about' => false,
      'faq' => false,
      'contact' => false,
      'repair' => false,
      'track' => false,
      //admin
      'admin_home' => false,
      'inventory' => false,
      'manage' => false,
      'sales' => false,
      'location' => false,
      'settings' => false
    ];

    $pages[$page] = true;

    return $pages;

  }

}
