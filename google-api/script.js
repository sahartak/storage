var store_id='';

    jQuery(document).on('click','.delete', function(){
        store_id=$(this).attr('rel');
        $('#Popup').modal({show:true, backdrop: 'static', keyboard: false });
    });
    jQuery(document).on('click','#delete',function(){
        var url='delete_store.php?id='+store_id;
        document.location.href=url;

    });


    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var map = null;
    var ship=0;
    var geocoder = null;
    var markers = [];
    var markersById = [];
    var infoWindow = null;
    var address;
    //var infowindow = new google.maps.InfoWindow({disableAutoPan: true,maxWidth:200});
    var marker, i;
    var page=0;
    var pageno=1;
    var pages;
    var inter=10;
    var appInit=0;
    var pager;
    var selMarker;

    var input;
    var zoomLeve1=1;
    var autocomplete;
    var localAddr;
    var map_id;
    var curLocation='';
    var selLocation;
    /*var markers = new Array();*/
    var markerContent=[];
    var addresses={};
    jQuery('#store-locator').click(function(e){
        e.preventDefault();
    });
    jQuery('#myModal').on('hidden.bs.modal', function () {

    })
    jQuery('#myModal').on('shown.bs.modal', function () {
        initializeMap();
        $('.suggest-location').show();

    })
    // Return a helper with preserved width of cells
var fixHelper = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$("#sort1 tbody").eq(0).sortable({
    helper: fixHelper,
    start: function(event, ui){
        /*ui.item.addClass('drag-started');*/
        /*ui.item.find('a').css('color','#fff');*/
        $('.update-order').removeAttr('disabled').removeClass('btn-default').removeAttr('style').css('margin-bottom','5px').addClass('btn-primary');
    },
    stop: function( event, ui ){
        $(this).find('tr').each(function(i){
            $(this).find('td:first .row-no').text(i+1);
        });
        $('.update-order').removeAttr('disabled');
        updateOrder();
    },
    update: function( event, ui ){
        $(this).find('tr').each(function(i){
            $(this).find('td:first .row-no').text(i+1);
        });
    }
}).disableSelection();



var fixHelperModified = function(e, tr) {
    var $originals = tr.children();
    var $helper = tr.clone();
    $helper.children().each(function(index)
    {
        $(this).width($originals.eq(index).width())
    });
    return $helper;
};
function updateOrder(){
    var store_list=[];
    var user_id=$('#user_id').val();
    store_list.push({user_id:user_id});
    $('#sort1 tbody tr').each(function(i,v){
        var order=i+1;
        var store_id=$(v).find('td input').attr('id');
        store_list.push({store_id:store_id,order:order});
    })
    console.log(store_list);
    if(store_list.length>0)
    {
        $.post('save_userlist.php', {data:store_list}, function(data, textStatus, xhr) {
            $('.update-order').attr('disabled','disabled');
        });
    }
}
$(document).on('click','.add-list',function(e){
    var user_id=$('#user_id').val();
    var store_id=$(this).attr('id');
    var store_list=[];
    store_list.push({store_id:store_id,user_id:user_id});
    $.post('save_userlist.php', {add_list:store_list}, function(data, textStatus, xhr) {
        data=$.parseJSON(data);
        if(data.user_data)
        {
            var dt=data.user_data;
            var html='<tr class="ui-sortable-handle"><td style="width: 100px;"><input type="hidden" id="'+dt.id+'" /><span class="arrow arrow-up1"><i class="fa fa-arrow-up"></i></span><span class="row-no">1</span><span class="arrow arrow-down1"><i class="fa fa-arrow-down"></i></span></td><td><h4>'+dt.store_name+'</h4>'+dt.address+'</td><td>'+dt.status+'</td><td>'+dt.operation_hours+'</td><td><a href="add-store.php?id='+dt.id+'" class="edit" rel="'+dt.id+'">Edit</a> <a href="#" class="delete" rel="'+dt.id+'">Delete</a></td></tr>';
            $('#sort1 tbody').eq(0).prepend(html);
            rearrange();
        }
        if(data.error)
        {
            alert(data.error);
        }
        else if(data.success)
        {
            alert(data.success);
        }
    });

});

function moveUp(item) {
    var prev = item.prev();
    if (prev.length == 0)
        return;
    prev.css('z-index', 999).css('position','relative').animate({ top: item.height() }, 250);
    item.css('z-index', 1000).css('position', 'relative').animate({ top: '-' + prev.height() }, 300, function () {
        prev.css('z-index', '').css('top', '').css('position', '');
        item.css('z-index', '').css('top', '').css('position', '');
        item.insertBefore(prev);

    });
}
function moveDown(item) {
    var next = item.next();
    if (next.length == 0)
        return;
    next.css('z-index', 999).css('position', 'relative').animate({ top: '-' + item.height() }, 250);
    item.css('z-index', 1000).css('position', 'relative').animate({ top: next.height() }, 300, function () {
        next.css('z-index', '').css('top', '').css('position', '');
        item.css('z-index', '').css('top', '').css('position', '');
        item.insertAfter(next);
    });

}

var t;
$('.arrow-up1').click(function() {
    var item=$(this).parent().parent();
    t=item;
    moveUp(item);
    rearrange();
});
function rearrange()
{
    $('#sort1 tbody').find('tr').each(function(i){
        $(this).find('td:first .row-no').text(i+1);
        alert($(this).find('td:first .row-no').text());
    });
    updateOrder();

}
$('.arrow-down1').click(function() {
    var item=$(this).parent().parent();
    t=item;
    moveDown(item);
    rearrange();
});