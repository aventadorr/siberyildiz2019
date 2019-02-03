
Erişilen uygulama üzerinde birden fazla atak vektörü denendi ve sql injection testi yapılırken `'` ile oluşturulan qr code yüklendiği zaman sql injection olduğunu belirtir hatalar elde edildi.

Sonrasında sql injection payload'u oluşturmak için yazdığımız python kodu kullanılarak `' or '1'='1'#` i içeren qr kodu gönderildi. Elde edilen dump sonucunda; `6b71dfdc4c5603272482f5b80db96a0a == admin1234567890`

admin:admin1234567890 -- login olundu flag alındı
