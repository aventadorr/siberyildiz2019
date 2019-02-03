**Web200 :**

Sorunun sayfasına gidildiğinde verilen ipucu üzerinden referer http başlığının üzerinden bir işlem yapılacağı çıkarımında bulunduk. İstekler içerisinde `Referer` http başlığına `a` değeri verilerek gönderildiğinde uygulamanın farklı bir şekilde cevap verdiği gözlemlendi. Sonrasında `a` değeri yerine kendi modemimiz üzerinden port yönlendirme yaparak, kendi dış ip adresimizi verdiğimizde bize istek geldiğini gözlemledik. Gelen istek içerisinde flag bulundu.
