@extends('admin.layout.main')
@section('admincontent')

<style>
    @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");

    /* ---------------Animation---------------- */

    .slit-in-vertical {
        -webkit-animation: slit-in-vertical 0.45s ease-out both;
        animation: slit-in-vertical 0.45s ease-out both;
    }

    @-webkit-keyframes slit-in-vertical {
        0% {
            -webkit-transform: translateZ(-800px) rotateY(90deg);
            transform: translateZ(-800px) rotateY(90deg);
            opacity: 0;
        }

        54% {
            -webkit-transform: translateZ(-160px) rotateY(87deg);
            transform: translateZ(-160px) rotateY(87deg);
            opacity: 1;
        }

        100% {
            -webkit-transform: translateZ(0) rotateY(0);
            transform: translateZ(0) rotateY(0);
        }
    }

    @keyframes slit-in-vertical {
        0% {
            -webkit-transform: translateZ(-800px) rotateY(90deg);
            transform: translateZ(-800px) rotateY(90deg);
            opacity: 0;
        }

        54% {
            -webkit-transform: translateZ(-160px) rotateY(87deg);
            transform: translateZ(-160px) rotateY(87deg);
            opacity: 1;
        }

        100% {
            -webkit-transform: translateZ(0) rotateY(0);
            transform: translateZ(0) rotateY(0);
        }
    }

    /*---------------#region Alert--------------- */

    #dialogoverlay {
        display: none;
        opacity: .8;
        position: fixed;
        top: 0px;
        left: 0px;
        background: #707070;
        width: 100%;
        z-index: 10;
    }

    #dialogbox {
        display: none;
        position: fixed;
        background: rgb(0, 47, 43);
        border-radius: 7px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.575);
        transition: 0.3s;
        width: 40%;
        z-index: 10;
        top: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    #dialogbox:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.911);
    }

    .pure-material-button-contained {
        position: relative;
        display: inline-block;
        box-sizing: border-box;
        border: none;
        border-radius: 4px;
        padding: 0 16px;
        min-width: 64px;
        height: 36px;
        vertical-align: middle;
        text-align: center;
        text-overflow: ellipsis;
        text-transform: uppercase;
        color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
        background-color: rgb(var(--pure-material-primary-rgb, 0, 77, 70));
        /* background-color: rgb(1, 47, 61) */
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        font-family: var(--pure-material-font, "Roboto", "Segoe UI", BlinkMacSystemFont, system-ui, -apple-system);
        font-size: 14px;
        font-weight: 500;
        line-height: 36px;
        overflow: hidden;
        outline: none;
        cursor: pointer;
        transition: box-shadow 0.2s;
    }

    .pure-material-button-contained::-moz-focus-inner {
        border: none;
    }

    /* ---------------Overlay--------------- */

    .pure-material-button-contained::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
        opacity: 0;
        transition: opacity 0.2s;
    }

    /* Ripple */
    .pure-material-button-contained::after {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        border-radius: 50%;
        padding: 50%;
        width: 32px;
        /* Safari */
        height: 32px;
        /* Safari */
        background-color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
        opacity: 0;
        transform: translate(-50%, -50%) scale(1);
        transition: opacity 1s, transform 0.5s;
    }

    /* Hover, Focus */
    .pure-material-button-contained:hover,
    .pure-material-button-contained:focus {
        box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12);
    }

    .pure-material-button-contained:hover::before {
        opacity: 0.08;
    }

    .pure-material-button-contained:focus::before {
        opacity: 0.24;
    }

    .pure-material-button-contained:hover:focus::before {
        opacity: 0.3;
    }

    /* Active */
    .pure-material-button-contained:active {
        box-shadow: 0 5px 5px -3px rgba(0, 0, 0, 0.2), 0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12);
    }

    .pure-material-button-contained:active::after {
        opacity: 0.32;
        transform: translate(-50%, -50%) scale(0);
        transition: transform 0s;
    }

    /* Disabled */
    .pure-material-button-contained:disabled {
        color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
        background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.12);
        box-shadow: none;
        cursor: initial;
    }

    .pure-material-button-contained:disabled::before {
        opacity: 0;
    }

    .pure-material-button-contained:disabled::after {
        opacity: 0;
    }

    #dialogbox>div {
        background: #FFF;
        margin: 8px;
    }

    #dialogbox>div>#dialogboxhead {
        background: rgb(0, 77, 70);
        font-size: 19px;
        padding: 10px;
        color: rgb(255, 255, 255);
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    #dialogbox>div>#dialogboxbody {
        background: rgb(0, 47, 43);
        padding: 20px;
        color: #FFF;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    #dialogbox>div>#dialogboxfoot {
        background: rgb(0, 47, 43);
        padding: 10px;
        text-align: right;
    }

    /* CSS */
    .button-23 {
        margin-bottom: 20px !important;
        background-color: #FFFFFF;
        border: 1px solid #222222;
        border-radius: 8px;
        box-sizing: border-box;
        color: #222222;
        cursor: pointer;
        display: inline-block;
        font-family: Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif;
        font-size: 16px;
        font-weight: 600;
        line-height: 20px;
        margin: 0;
        outline: none;
        padding: 13px 23px;
        position: relative;
        text-align: center;
        text-decoration: none;
        touch-action: manipulation;
        transition: box-shadow .2s, -ms-transform .1s, -webkit-transform .1s, transform .1s;
        user-select: none;
        -webkit-user-select: none;
        width: 100%;
    }

    .button-23:focus-visible {
        box-shadow: #222222 0 0 0 2px, rgba(255, 255, 255, 0.8) 0 0 0 4px;
        transition: box-shadow .2s;
    }

    .button-23:active {
        background-color: #F7F7F7;
        border-color: #000000;
        transform: scale(.96);
    }

    .button-23:disabled {
        border-color: #DDDDDD;
        color: #DDDDDD;
        cursor: not-allowed;
        opacity: 1;
    }

    .button-23:hover {
        background-color: #f5f5f0;
    }

    .checkbox-center {
        display: flex;
        gap: 25px;
        align-items: center;
    }

    .checkboxitemsalignment {
        display: flex;
        gap: 15px;
        justify-content: center;
        align-items: flex-end;
    }

    .checkboxitemsalignment input {
        height: 30px;
        width: 30px;
    }

    .paddingcheckbox {
        padding-top: 15px;
    }
</style>
<div id="imagePreview"></div>
<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <form action="{{ route('update.product', ['id' => $product->id]) }}" method="post" class="col-sm-8 m-auto" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Information</h5>
                            </div>
                            <h3><span style="color:red;font-size:35px;">*</span> Denotes to madatory fields</h3>
                            <br>
                            <br>
                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0"><span style="color:red;font-size:20px;display:inline-block;">*</span>Product
                                        Name </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="product_name" value="{{old('product_name')}}" type="text" placeholder="Product Name">
                                        @if ($errors->has('product_name'))
                                        <div class="alert alert-danger">{{ $errors->first('product_name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title"><span style="color:red;font-size:20px;display:inline-block;">*</span>Unit</label>
                                    <div class="col-sm-9">
                                        <select name="unit" class="js-example-basic-single w-100">
                                            <option disabled selected>Unit Menu</option>
                                            <option {{ old('unit') == 'kg' ? 'selected' : '' }} value="kg">Kilogram</option>
                                            <option {{ old('unit') == 'pcs' ? 'selected' : '' }} value="pcs">Pieces</option>
                                        </select>
                                        @if ($errors->has('unit'))
                                        <div class="alert alert-danger">{{ $errors->first('unit') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Exchangeable</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input type="checkbox" name="exchangeable" value="1" {{ old('exchangeable') == '1' ? 'checked' : '' }}><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Refundable</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input type="checkbox" name="refundable" value="1" {{ old('refundable') == '1' ? 'checked' : '' }}><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title"><span style="color:red;font-size:20px;display:inline-block;">*</span>Size</label>
                                    <div class="col-sm-9 checkbox-center">
                                        <div class="checkboxitemsalignment">XS<input type="checkbox" name="sizes[]" value="xs" class="" id="" {{ in_array('xs', old('sizes', [])) ? 'checked' : '' }}><span class="checkmark"></span></div>
                                        <div class="checkboxitemsalignment">S<input type="checkbox" name="sizes[]" value="s" class="" id="" {{ in_array('s', old('sizes', [])) ? 'checked' : '' }}></div>
                                        <div class="checkboxitemsalignment">M<input type="checkbox" name="sizes[]" value="m" class="" id="" {{ in_array('m', old('sizes', [])) ? 'checked' : '' }}></div>
                                    </div>
                                    <div class="row col-sm-9">
                                        <div class="col-12 col-md-5">

                                        </div>
                                        <div class="col-12 col-md-7 checkbox-center paddingcheckbox">
                                            <div class="checkboxitemsalignment">L<input type="checkbox" name="sizes[]" value="l" class="" id="" {{ in_array('l', old('sizes', [])) ? 'checked' : '' }}></div>
                                            <div class="checkboxitemsalignment">XL<input type="checkbox" name="sizes[]" value="xl" class="" id="" {{ in_array('xl', old('sizes', [])) ? 'checked' : '' }}></div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 10px;" class="row">
                                        <div class="col-12 col-md-3"></div>
                                        @error('sizes')
                                        <div class="alert alert-danger col-12 col-md-9">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Description panel</h5>
                            </div>

                            <div class="theme-form theme-form-2 mega-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-3 mb-0">
                                                <span style="color:red;font-size:20px;display:inline-block;">*</span>Desc. for Quick view
                                            </label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="short_desc" id="" rows="3">{{old('short_desc')}}</textarea>
                                                @if ($errors->has('short_desc'))
                                                <div class="alert alert-danger">{{ $errors->first('short_desc') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="theme-form theme-form-2 mega-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-3 mb-0">Additional
                                                Desc. for more info. panel
                                            </label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="more_details" id="" rows="8">{{old('more_details')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="theme-form theme-form-2 mega-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-3 mb-0">Bulletin 1.
                                            </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="bulletin_1" value="{{old('bulletin_1')}}" type="text">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-3 mb-0">Bulletin 2.
                                            </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="bulletin_2" value="{{old('bulletin_2')}}" type="text">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-3 mb-0">Bulletin 3.
                                            </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="bulletin_3" value="{{old('bulletin_3')}}" type="text">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-3 mb-0">Bulletin 4.
                                            </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="bulletin_4" value="{{old('bulletin_4')}}" type="text">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-3 mb-0">Bulletin 5.
                                            </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="bulletin_5" value="{{old('bulletin_5')}}" type="text">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Images</h5>
                            </div>

                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title"><span style="color:red;font-size:20px;display:inline-block;">*</span>Image 1</label>
                                    <div class="col-sm-9">
                                        <input onchange="return fileValidation(this)" class="form-control form-choose" name="image_1" type="file" id="file">
                                        @if ($errors->has('image_1'))
                                        <div class="alert alert-danger">{{ $errors->first('image_1') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Image 2</label>
                                    <div class="col-sm-9">
                                        <input onchange="return fileValidation(this)" class="form-control form-choose" name="image_2" type="file" id="formFile">
                                        @if ($errors->has('image_2'))
                                        <div class="alert alert-danger">{{ $errors->first('image_2') }}</div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Image 3</label>
                                    <div class="col-sm-9">
                                        <input onchange="return fileValidation(this)" class="form-control form-choose" name="image_3" type="file" id="formFile">
                                        @if ($errors->has('image_3'))
                                        <div class="alert alert-danger">{{ $errors->first('image_3') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Image 4</label>
                                    <div class="col-sm-9">
                                        <input onchange="return fileValidation(this)" class="form-control form-choose" name="image_4" type="file" id="formFile">
                                        @if ($errors->has('image_4'))
                                        <div class="alert alert-danger">{{ $errors->first('image_4') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Image 5</label>
                                    <div class="col-sm-9">
                                        <input onchange="return fileValidation(this)" class="form-control form-choose" name="image_5" type="file" id="formFile">
                                        @if ($errors->has('image_5'))
                                        <div class="alert alert-danger">{{ $errors->first('image_5') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Price</h5>
                            </div>

                            <div class="theme-form theme-form-2 mega-form">
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title"><span style="color:red;font-size:20px;display:inline-block;">*</span>price</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="originalPrice" name="price" value="{{old('price')}}" type="number" placeholder="0">
                                        @if ($errors->has('price'))
                                        <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                                        @endif

                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Discount Rate (%)</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="discountPercentage" name="disc_rate" value="{{old('disc_rate')}}" type="number" placeholder="0">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Discount Amount</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="discountAmount" name="disc_price" value="{{old('disc_price')}}" type="number" placeholder="0" readonly>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Final Amount</label>
                                    <div class="col-sm-9">
                                        <input style="font-weight:bold;color:darkblue;" class="form-control" name="final_price" value="{{old('final_price')}}" type="number" id="finalPrice" placeholder="0" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="button-23">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function CustomAlert() {
        this.alert = function(message, title) {
            document.body.innerHTML = document.body.innerHTML + '<div id="dialogoverlay"></div><div id="dialogbox" class="slit-in-vertical"><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div>';

            let dialogoverlay = document.getElementById('dialogoverlay');
            let dialogbox = document.getElementById('dialogbox');

            let winH = window.innerHeight;
            dialogoverlay.style.height = winH + "px";

            dialogbox.style.top = "100px";

            dialogoverlay.style.display = "block";
            dialogbox.style.display = "block";

            document.getElementById('dialogboxhead').style.display = 'block';

            if (typeof title === 'undefined') {
                document.getElementById('dialogboxhead').style.display = 'none';
            } else {
                document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + title;
            }
            document.getElementById('dialogboxbody').innerHTML = message;
            document.getElementById('dialogboxfoot').innerHTML = '<button class="pure-material-button-contained active" onclick="customAlert.ok()">OK</button>';
        }

        this.ok = function() {
            document.getElementById('dialogbox').style.display = "none";
            document.getElementById('dialogoverlay').style.display = "none";
        }
    }

    let customAlert = new CustomAlert();


    function fileValidation(element) {
        var fileInput = element;
        var filePath = fileInput.value;

        // Allowing file type
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            customAlert.alert('Invalid file type' + '<br>' + 'Allowed Types (PDF, PNG, JPEG)', 'Alert !!!');
            fileInput.value = '';
            return false;
        } else {
            // Check file size
            var fileSize = fileInput.files[0].size; // in bytes
            var maxSize = 1024 * 158; // 1 MB

            if (fileSize > maxSize) {
                customAlert.alert('File size exceeds' + '<br>' + 'Max allowed size (150 KB)', 'Alert !!!');
                fileInput.value = '';
                return false;
            }
        }

        return true; // Add this line to indicate validation success
    }
</script>
<!-- New Product Add End -->
<script>
    // Get references to the input fields
    const originalPriceInput = document.getElementById("originalPrice");
    const discountPercentageInput = document.getElementById("discountPercentage");
    const discountAmountInput = document.getElementById("discountAmount");
    const finalPriceInput = document.getElementById("finalPrice");

    // Add event listeners to calculate the discount and final price
    originalPriceInput.addEventListener("input", updatePrice);
    discountPercentageInput.addEventListener("input", updatePrice);

    function updatePrice() {
        console.log("first")
        // Get the original price and discount percentage
        const originalPrice = parseFloat(originalPriceInput.value) || 0;
        const discountPercentage = parseFloat(discountPercentageInput.value) || 0;

        // Calculate the discount amount and final price
        const discountAmount = (originalPrice * discountPercentage) / 100;
        let finalPrice = originalPrice - discountAmount;

        // Round up the final price to the nearest whole number
        finalPrice = Math.ceil(finalPrice);

        // Update the input fields with the calculated values
        discountAmountInput.value = discountAmount;
        finalPriceInput.value = finalPrice;
    }
</script>
<!-- latest js -->
<script src="{{ asset('adminassets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('adminassets/js/notify/bootstrap-notify.min.js')}}"></script>
@if(session('success'))
<script>
    'use strict';
    var notify = $.notify('<i class="fas fa-bell"></i></i><strong>Success</strong> task done', {
        type: 'theme',
        allow_dismiss: true,
        delay: 4000,
        showProgressbar: true,
        timer: 300,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
    });

    setTimeout(function() {
        notify.update('message', '<i class="fas fa-bell"></i></i><strong>Product</strong> Created.');
    }, 1800);
</script>
@endif
@if ($errors->any())
<style>
    .alert-theme span+span+span,
    .alert-theme button {
        color: red !important;
    }

    .alert-theme .progress .progress-bar {
        background-color: red;
    }
</style>
<script>
    'use strict';
    var notify = $.notify('<i class="fas fa-bell"></i></i><strong>Product creation failed</strong> !!!...', {
        type: 'theme',
        allow_dismiss: true,
        delay: 4000,
        showProgressbar: true,
        timer: 140,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
    });

    setTimeout(function() {
        notify.update('message', '<i class="fas fa-bell"></i></i><strong></strong>Possible Errors found.');
    }, 1800);
</script>

@endif
@endsection