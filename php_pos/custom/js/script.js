$(document).ready(function(){

    showData();
    count();
    //password validate
    $('#password, #cpassword').on('keyup', function () {
        if ($('#password').val() == $('#cpassword').val()) {
            $('#cerror').html('Match').css('color', 'green');
        } else
            $('#cerror').html('Not Match').css('color', 'red');
    });

    //add btn
    $(".addtocartBtn").click(function (){
        let id = $(this).data("id");
        let name = $(this).data("name");
        let codeno = $(this).data("codeno");
        let price = $(this).data("price");
        let discount= $(this).data("discount");
        let photo = $(this).data("photo");
        let qty = 1;

        let items = {id:id, name:name,codeno:codeno, photo:photo, qty:qty, price:price,discount:discount,}
        let itemList = localStorage.getItem("item");

        let itemListId = [];
        let itemListArray;

        if(itemList === null)
        {
            itemListArray = [];
        }
        else
        {
            itemListArray = JSON.parse(itemList);
        }

        let status = false;
        $.each(itemListArray,function (i,v){
            if(v.id === id)
            {
                v.qty++;
                status = true;
            }
        });
        if(status === false)
        {
            itemListArray.push(items);
        }
        let itemListString = JSON.stringify(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();



    });

    //show Data func
    function showData() {
        let items = localStorage.getItem("item");
        if(items)
        {
            let itemListArray = JSON.parse(items);
            let html = "";
            let num = 1;
            let total = 0;
            // console.log(itemListArray);
            $.each(itemListArray, function (i, v) {

                var originalPrice;
                var discountPrice;
                if(v.discount != 0 || v.discount != "")
                {
                    var subTotal = v.qty * v.discount;
                    discountPrice = v.discount;
                    originalPrice = v.price;
                }
                else {
                    var subTotal = v.qty * v.price;
                    discountPrice = "0";
                    originalPrice = v.price;
                }

                // console.log(v.qty);
                total += subTotal;
                html += `<tr>
                    <td>
                        <button data-id="${i}" class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%">
                            <i class="icofont-close-line"></i>
                        </button>
                    </td>
                    <td>
                        <img src="${v.photo}" class="cartImg">
                    </td>
                    <td>
                        <p class="text-info">Item Name : ${v.name}</p>
                        <p class="text-info">Item Code : ${v.codeno}</p>
                    </td>
                    <td>
                        <button data-id="${i}" class="btn btn-outline-secondary plus_btn">
                            <i class="icofont-plus"></i>
                        </button>
                    </td>
                    <td>
                        <p class="text-info">${v.qty}</p>
                    </td>
                    <td>
                        <button data-id="${i}" class="btn btn-outline-secondary minus_btn">
                            <i class="icofont-minus"></i>
                        </button>
                    </td>
                    <td>
   
                        <p class="text-success">
                           Discount : ${discountPrice} mmk
                        </p>
                        <p class="font-weight-lighter text-success">
                            Price : ${originalPrice} mmk
                        </p>
                    </td>
                    <td class="text-success">
                        ${subTotal} mmk
                    </td>
                </tr>`;
            });

            //total footer table
            html+= `
                    <tr>
                        <td colspan="8">
                            <h3 class="text-right text-success"> Total : ${total} Ks </h3>
                        </td>
                    </tr>
                   `;
            //defining table
            $("tbody").html(html);
            count();
        }
    }

    //count data func
    function count() {
        let totalCount = 0;
        let itemList = localStorage.getItem("item");
        if(itemList)
        {
            let itemListArray = JSON.parse(itemList);
            $.each(itemListArray,function(i,v) {
                totalCount += v.qty;
            });
        }
        $(".cartNoti").html(totalCount);
    }

    //remove btn
    $("tbody").on('click','.remove',function (){
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);

        let chk = confirm("Are you sure you want to remove this item ?");
        if(chk === true)
        {
            itemListArray.splice(id,1);
            let itemListString = JSON.stringify(itemListArray);
            localStorage.setItem("item",itemListString);
            showData();
            count();
        }
    });

    //increase btn
    $("tbody").on("click",'.plus_btn',function (){
        // alert('Ok');
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);
        itemListArray[id].qty++;

        let itemListString = JSON.stringify(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();
        count();
    });

    //decrease btn
    $("tbody").on("click",'.minus_btn',function (){
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);
        if(itemListArray[id].qty <= 1)
        {
            itemListArray.splice(id,1);
            let itemListString = JSON.stringify(itemListArray);
            localStorage.setItem("item",itemListString);
            showData();
            count();
        }
        else
        {
            itemListArray[id].qty--;
        }
        let itemListString = JSON.stringify(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();
        count();
    });

});