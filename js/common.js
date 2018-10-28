//  выравнивание флоченых блоков по высоте
function setEqualHeight(columns) {
    var tallestcolumn = 0;

    columns.each(function(){
        currentHeight = $(this).height();

        if(currentHeight > tallestcolumn){
            tallestcolumn = currentHeight;
        }
    });

    columns.height(tallestcolumn);
}

$(document).ready(function() {
    setEqualHeight($(".single-product-atributes > div"));

    // попап поиск
    $('#head-m-search-btn').on('click', function(e) {
        e.preventDefault();
        $('.my-woo-search-wrap').addClass('visible');
    });
    $('#my-woo-search-close').on('click', function(e) {
        e.preventDefault();
    $('.my-woo-search-wrap').removeClass('visible');
    });

    // ховер на ткани товара
    $('a.swatch-anchor').hover(function(){
      var imgSrc = $(this).children('img').attr("src");
      var imgName = $(this).attr("title");
      $(this).append('<img src="'+ imgSrc +'" alt="" class="swatch-anchor-big-img"><span class="tkan-title">'+ imgName +'</span>');
    },function(){
      $('.swatch-anchor-big-img, .tkan-title').remove();
    });
});