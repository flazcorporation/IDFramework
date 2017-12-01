# <img src="https://raw.githubusercontent.com/flazcorporation/IDFramework/master/public/theme/back/material/image/Logo%20Horizontal.png" />

The Indonesia PHP Framework
IDFramework is a minify framework. This is very easy to use and small. Best for simple and middle application. This framework is maintained by community.

# Front-End
<img src="https://raw.githubusercontent.com/flazcorporation/IDFramework/master/public/theme/front/web/images/IDFramework%20Front-End.png" />

# Back-End
<img src="https://raw.githubusercontent.com/flazcorporation/IDFramework/master/public/theme/back/material/image/Frontend.png" />

# Fitur
1. MVC (Model View Controller);
2. Modular, file MCV dibuat dalam saru folder;
3. URI Class;
4. HTML Class;
5. PDO Class;
6. File Project yang bisa diubah/dipindahkan;
7. File lebih kecil, hanya 130KB;
8. dan fitur lainnya yang sedang dikembangkan.

# Spesifikasi Sistem

| Type                  | Description                       |
| --------------------- |:---------------------------------:|
| PHP Version           | 5.4 ke atas                       |
| Database Extension    | PDO                               |
| File Size             | 130KB                             |
| OS                    | Linux, Windows                    |

# Dukungan
Kami masih membutuhkan banyak kontribusi dari teman-teman. Silahkan Fork, Star, Watch.

# Kontribusi
Silahkan melakukan kontribusi untuk mengembangankan IDFramework melalui Clone di Branch Alpha.

```
git clone -dev https://github.com/mulyawansentosa/IDFramework.git
```

Setelah kami review kami akan naikan menjadi beta dan master. Dukungan Anda adalah kekuatan Framework ini :) Maju Indonesiaku!

# Dokumentasi
## Daftar Isi
### [URI Class](#uri-class)
#### [$this->uri->controller()](#this-uri-controller)
#### [$this->uri->method()](#this-uri-method)
...

## URI Class
Untuk menggunakan fasilitas URI Class, tambahkan kode berikut pada custructor di MVC Anda:

```php
function __cunstruct(){
    parent::uri();
}
```

Method yang saat ini tersedia antara lain:
### $this->uri->controller()

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Menampilkan Controller URL Aktif  |
| Contoh        | http://framework.id/blog/id/5     |
| Hasil         | blog                              |

### $this->uri->method()

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Menampilkan Controller URL Aktif  |
| Contoh        | http://framework.id/blog/id/5     |
| Hasil         | id                                |

### $this->uri->segment(1)

| Doc           | Description                           |
| ------------- |:---------------------------------:    |
| Type          | String                                |
| Fungsi        | Menampilkan Segment URL Aktif Ke-n    |
| Contoh        | http://framework.id/blog/id/5         |
| Hasil         | id                                    |

### $this->uri->all()

| Doc           | Description                                                   |
| ------------- |:---------------------------------:                            |
| Type          | Array                                                         |
| Fungsi        | Menampilkan Semua Segment yang URL Aktif                      |
| Contoh        | http://framework.id/blog/id/5                                 |
| Hasil         | [0]=> string(4) "blog" [1]=> string(2) "id" [1]=> int(1) "5"  |

### $this->uri->last()

| Doc           | Description                           |
| ------------- |:---------------------------------:    |
| Type          | String                                |
| Fungsi        | Menampilkan Segment Akhir URL Aktif   |
| Contoh        | http://framework.id/blog/id/5         |
| Hasil         | 5                                     |

### $this->uri->except(aray(0,2))

| Doc           | Description                           |
| ------------- |:---------------------------------:    |
| Type          | String                                |
| Fungsi        | Menampilkan Controller Aktif dari URL |
| Contoh        | http://framework.id/blog/id/5         |
| Hasil         | id                                    |

### $this->uri->link($string)

| Doc           | Description                           |
| ------------- |:---------------------------------:    |
| Type          | String                                |
| Fungsi        | Menampilkan Link URL                  |
| Contoh        | $this->uri->link('blog/id/1')         |
| Hasil         | http://framework.id/blog/id/1         |

### $this->uri->file($file)

| Doc           | Description                           |
| ------------- |:---------------------------------:    |
| Type          | String                                |
| Fungsi        | Menampilkan Link URL File             |
| Contoh        | $this->uri->link('blog/id/1')         |
| Hasil         | http://framework.id/blog/id/1         |

### $this->uri->inc($file)

| Doc           | Description                           |
| ------------- |:---------------------------------:    |
| Type          | String                                |
| Fungsi        | Menampilkan Link URL Include          |
| Contoh        | $this->uri->link('blog/id/1')         |
| Hasil         | http://framework.id/blog/id/1         |


## HTML Class
Untuk menggunakan fasilitas HTML Class, tambahkan kode berikut pada custructor di MVC Anda:

```php
function __cunstruct(){
    parent::html();
}
```

Method yang saat ini tersedia antara lain:
### $this->html->h1($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Heading 1                         |
| Contoh        | $this->html->h1('IDFramework')    |
| Hasil         | <h1>IDFramework</h1>              |

### $this->html->h2($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Heading 2                         |
| Contoh        | $this->html->h2('IDFramework')    |
| Hasil         | <h2>IDFramework</h2>              |

### $this->html->h3($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Heading 3                         |
| Contoh        | $this->html->h3('IDFramework')    |
| Hasil         | <h3>IDFramework</h3>              |

### $this->html->h4($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Heading 4                         |
| Contoh        | $this->html->h4('IDFramework')    |
| Hasil         | <h4>IDFramework</h4>              |

### $this->html->h5($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Heading 5                         |
| Contoh        | $this->html->h5('IDFramework')    |
| Hasil         | <h5>IDFramework</h5>              |

### $this->html->h6($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Heading 6                         |
| Contoh        | $this->html->h2('IDFramework')    |
| Hasil         | <h6>IDFramework</h6>              |

### $this->html->b($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Bold                              |
| Contoh        | $this->html->b('IDFramework')     |
| Hasil         | <b>IDFramework</b>                |

### $this->html->i($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Italic                            |
| Contoh        | $this->html->i('IDFramework')     |
| Hasil         | <i>IDFramework</i>                |

### $this->html->u($string)

| Doc           | Description                       |
| ------------- |:---------------------------------:|
| Type          | String                            |
| Fungsi        | Underlined                        |
| Contoh        | $this->html->u('IDFramework')     |
| Hasil         | <u>IDFramework</u>                |

### $this->html->img($src, $alt)

| Doc           | Description                                                   |
| ------------- |:---------------------------------:                            |
| Type          | String                                                        |
| Fungsi        | Bold                                                          |
| Contoh        | $this->html->img('https://flazhost.com/themes/fh/assets/images/LogoPutih200.png', 'Logo FlazHost.Com')|
| Hasil         | <img src="https://flazhost.com/themes/fh/assets/images/LogoPutih200.png" alt="Logo FlazHost.Com">IDFramework</b> |

## Database PDO

### $this->pdo->connect()
### $this->pdo->close()
### $this->pdo->create($table,$var)
### $this->pdo->create_transaction($database,$table,$var)
### $this->pdo->update($table, $var, $cond, $val)
### $this->pdo->update_transaction($database, $table, $var, $cond, $val)
### $this->pdo->delete($table,$cond,$val)
### $this->pdo->delete_transaction($database,$table,$cond,$val)
### $this->pdo->select_query($query,$attr)
### $this->pdo->select_query_transaction($database,$query,$attr)
### $this->pdo->select_query_row($query,$attr)
### $this->pdo->select_query_row_transaction($database,$query,$attr)
### $this->pdo->select_query_result($query,$attr)
### $this->pdo->select_query_result_transaction($database,$query,$attr)
### $this->pdo->select_query_field_string_where($query,$attr)
### $this->pdo->select_query_field_string_where_transaction($database,$query,$attr)
### $this->pdo->select_all($table)
### $this->pdo->select_all_transaction($database,$table)
### $this->pdo->select_query_result_json($query,$attr)
### $this->pdo->select_query_result_json_transaction($database,$query,$attr)
### $this->pdo->select_all_where_array_result($table,$cond,$val)
### $this->pdo->select_all_where_array_result_transaction($database,$table,$cond,$val)
### $this->pdo->select_all_where_result($table,$cond,$val)
### $this->pdo->select_all_where_result_transaction($database,$table,$cond,$val)
### $this->pdo->select_field_where_result($table,$field,$cond,$val)
### $this->pdo->select_field_where_result_transaction($database,$table,$field,$cond,$val)
### $this->pdo->select_fields_where($table,$field,$cond,$val)
### $this->pdo->select_fields_where_transaction($database,$table,$field,$cond,$val)
### $this->pdo->select_field_table($table,$field)
### $this->pdo->select_field_table_transaction($database,$table,$field)
### $this->pdo->select_field_where_string($table,$field,$cond,$val)
### $this->pdo->select_field_where_string_transaction($database,$table,$field,$cond,$val)
### $this->pdo->select_all_where($table,$cond,$val)
### $this->pdo->select_all_where_transaction($database,$table,$cond,$val)
### $this->pdo->query($query)
### $this->pdo->query_result($query)
### $this->pdo->query_result_prepare($query,$attr)
### $this->pdo->query_array($query)
### $this->pdo->query_array_prepare($query,$attr)
### $this->pdo->query_transaction($database,$query)
### $this->pdo->install_table($query)
### $this->pdo->install_table_transaction($database,$query)

# The MIT License (MIT)
Copyright (c) 2017, Flaz Corporation

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
