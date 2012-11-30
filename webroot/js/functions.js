var th = ['','thousand','million', 'billion','trillion'];
var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}

jQuery(function(){
    //classifying browsers
    if($.browser.mozilla){ $('html').addClass('firefox'); }else if($.browser.msie){ $('html').addClass('internet-explorer'); }else if($.browser.webkit){ $('html').addClass('webkit'); }else if($.browser.opera) { $('html').addClass('opera'); }
    //classifying versions
    if($.browser.mozilla || $.browser.msie || $.browser.opera){  $('html').addClass(toWords($.browser.version.replace('.','').replace('0',''))); }
    //placeholder
    if($.browser.msie){
        $('[placeholder]').focus(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                        input.val('');
                        input.removeClass('placeholder');
                }
        }).blur(function() {
                var input = $(this);
                if (input.val() == '' || input.val() == input.attr('placeholder')) {
                        input.addClass('placeholder');
                        input.val(input.attr('placeholder'));
                }
        }).blur().parents('form').submit(function() {
        $(this).find('[placeholder]').each(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                        input.val('');
                }
                })
        });
    }
    //menu sidebar
    $('.menu>.button').click(function(){
        var $obj=$(this).next('ul');
        $obj.slideToggle();
        console.log($obj);
        return false;
    });
    //share bar
    $('.share').css({'top': $('.bartop').height() - 10,'height':$('#container').height()});
    $('.share>.content').css({'top': $('.bartop').height() + 20});
    
});