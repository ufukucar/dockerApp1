# AÇIKLAMA #

- Sistem __Docker__ ortamında geliştirilmiştir.

- Geliştirme ortamı olarak __Laravel__ kullanılmıştır.

- Programalama dili, __PHP__ 'dir.

- Veritabanı olarak __MySQL__ kullanılmıştır.

- Projeyi çalıştırmak için "__docker compose up__" yapmanız yeterlidir. 

- Sunucu seçimi __Nginx__ olarak yapılmıştır.

- İstekler Api üzerinden "__post__" isteği ile gelmelidir.

---

## GÖREV 1 ##

#### Görev Tanımı:
Siparişler için, ekleme / silme / listeleme işlemlerinin gerçekleştirilebileceği 
bir RESTful API servisi oluşturun.

#### Proje Detayı: ####
- Bu görev için belirlenen API dosyaları, "__api__" dizini altında bulunan "__apiV1__"
dizinidir.

- http://localhost/api/products adresi üzerinden ürünler listelenebilir.


- Sipariş vermek için aşağıdaki adımlar uygulanmalıdır. 
  - http://localhost/api/customer/login adresine post isteği gönderilmeli.
  - Body üzerinden email ve password parametreleri gönderilmelidr. Örnek email: "ufuk.ucar@customer.com", password: "password"
  - Geri dönen "__token__" değeri, bundan sonraki tüm isteklerde kullanılacağı için her istek __HEADER__ ına "__Authorization__" olarak __Bearer token__ verilmelidir.
  - http://localhost/api/customers/orders adresini sipariş kullanabilirsiniz.
  - Sipaişler body üzerinden __JSON__ formatında gönderilmelidir. 
  - Siparişler http://localhost/api/customers/orders/store adresine gönderilebilir. Sipariş numarası geri döndürülmektedir.  Örnek istek gövdesi aşağıdadır.
```
{
    "data" : [
         {
            "productId": 1,
            "quantity" : 10
         }, 
         {
            "productId": 2,
            "quantity" : 20
         },
         {
            "productId": 3,
            "quantity" : 7
         },
         {
            "productId": 4,
            "quantity" : 20
        }
    ]
}

```
-   http://localhost/api/customers/orders/delete adresine body üzerinen __orderNumber__ number parametresi gönderilerek sipariş silinebilir. 

---

## GÖREV 2 ##

#### Görev Tanımı:
Verilen siparişler için indirimleri hesaplayan küçük bir RESTful API servisi oluşturun.


#### Proje Detayı: ####

- Bu görev için belirlenen API dosyaları, "__api__" dizini altında bulunan "__discountApiV1__"
  dizinidir.

- Proje 81 numaralı portta çalışmaktadır.

- İlgili siparişe uygulanan indirimleri görmek için http://localhost:81/api/discounts adresine body içinde __orderNumber__ gönderilmelidir.

- Örnek çıktı aşağıdaki gibidir.


```

{
    "orderId": 1,
    "discounts": [
        {
            "discountReason": "BUY_5_GET_1",
            "discountAmount": "10.00",
            "subtotal": "60,00"
        },
        {
            "discountReason": "BUY_5_GET_1",
            "discountAmount": "60.00",
            "subtotal": "340,00"
        },
        {
            "discountReason": "20_PERCENT_CHEAPEST_ONE",
            "discountAmount": "200.00",
            "subtotal": "2200,00"
        },
        {
            "discountReason": "10_PERCENT_OVER_1000",
            "discountAmount": "247.00",
            "subtotal": "1953,00"
        }
    ],
    
    "totalDiscount": "517,00",
    "discountedTotal": "1953,00"
    
}

```# dockerLaravelHomeAssessment
