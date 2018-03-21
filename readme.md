<h3>Crud de banners para o teste datumti</h3>

O crud foi feito com laravel e banco de dados mysql. Tambem foi utilizada a biblioteca intervention/image para fazer o
upload das imagens. Abaixo seguem alguns passos para que o crud funcione corretamente. Estou enviando o dump do banco 
de dados junto, mas não será necessário utiliza-lo, pois executando as migrations terá o mesmo efeito.

<p>1 - executar o composer install para instalar as biliotecas necessárias</p>
<p>2 - fazer uma cópia do arquico env.example para .env</p> 
<p>3 - gerar a key da aplicação com o seguinte comando: php artisan key:generate</p>
<p>4 - configurar definições de banco de dados no arquivo .env</p>
<p>5 - Gerar as migrations com o comando php artisan migrate:install e php artisan migrate:refresh</p>



