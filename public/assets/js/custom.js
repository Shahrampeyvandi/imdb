"use strict";

(function ($) {
    $(".js-example-basic-single").select2({
        placeholder: "انتخاب کنید",
    });

    // $(document).on(
    //     "click",
    //     ".layout-builder .layout-builder-toggle",
    //     function () {
    //         $(".layout-builder").toggleClass("show");
    //     }
    // );

    // $(window).on("load", function () {
    //     setTimeout(function () {
    //         $(".layout-builder").removeClass("show");
    //     }, 500);
    // });

    // $("body").append(
    //     "" +
    //         '<div class="layout-builder show">' +
    //         '<div class="layout-builder-toggle shw">' +
    //         '<i class="ti-settings"></i>' +
    //         "</div>" +
    //         '<div class="layout-builder-toggle hdn">' +
    //         '<i class="ti-close"></i>' +
    //         "</div>" +
    //         '<div class="layout-builder-body">' +
    //         "<h5>سفارشی سازی</h5>" +
    //         '<div class="mb-3">' +
    //         "<p>طرح</p>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="horizontal-side-menu" data-layout="horizontal-side-menu">' +
    //         '<label class="custom-control-label" for="horizontal-side-menu">فهرست افقی</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="icon-side-menu" data-layout="icon-side-menu">' +
    //         '<label class="custom-control-label" for="icon-side-menu">فهرست آیکن</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="dark-side-menu" data-layout="dark-side-menu">' +
    //         '<label class="custom-control-label" for="dark-side-menu">فهرست تیره</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="hidden-side-menu" data-layout="hidden-side-menu">' +
    //         '<label class="custom-control-label" for="hidden-side-menu">فهرست پنهان</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="layout-container-1" data-layout="layout-container icon-side-menu">' +
    //         '<label class="custom-control-label" for="layout-container-1">طرح دربرگیرنده 1</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="layout-container-2" data-layout="layout-container horizontal-side-menu">' +
    //         '<label class="custom-control-label" for="layout-container-2">طرح دربرگیرنده 2</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="layout-container-3" data-layout="layout-container hidden-side-menu">' +
    //         '<label class="custom-control-label" for="layout-container-3">طرح دربرگیرنده 3</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="dark-1" data-layout="dark">' +
    //         '<label class="custom-control-label" for="dark-1">طرح تیره 1</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="dark-2" data-layout="layout-container dark icon-side-menu">' +
    //         '<label class="custom-control-label" for="dark-2">طرح تیره 2</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="dark-3" data-layout="layout-container dark horizontal-side-menu">' +
    //         '<label class="custom-control-label" for="dark-3">طرح تیره 3</label>' +
    //         "</div>" +
    //         '<div class="custom-control custom-radio">' +
    //         '<input type="radio" class="custom-control-input" name="layout" id="dark-4" data-layout="layout-container dark hidden-side-menu">' +
    //         '<label class="custom-control-label" for="dark-4">طرح تیره 4</label>' +
    //         "</div>" +
    //         "</div>" +
    //         '<button id="btn-layout-builder-reset" class="btn btn-danger btn-uppercase">بازنشانی</button>' +
    //         '<div class="layout-alert mt-3">' +
    //         '<i class="fa fa-warning m-l-5 text-warning"></i>برخی گزینه های قالب در صورت ترکیب با یکدیگر در صورتی که همخوانی نداشته باشند قابل نمایش نخواهند بود. بنابراین توصیه می شود گزینه های قالب را جدا جدا امتحان کنید.' +
    //         "</div>" +
    //         "</div>" +
    //         "</div>"
    // );

    // var site_layout = localStorage.getItem("site_layout");
    // $("body").addClass(site_layout);

    // $(
    //     '.layout-builder .layout-builder-body input[type="radio"][data-layout="' +
    //         $("body").attr("class") +
    //         '"]'
    // ).prop("checked", true);

    // $('.layout-builder .layout-builder-body input[type="radio"]').click(
    //     function () {
    //         var class_names = "";

    //         $(
    //             '.layout-builder .layout-builder-body input[type="radio"]:checked'
    //         ).each(function () {
    //             class_names += " " + $(this).data("layout");
    //         });

    //         localStorage.setItem("site_layout", class_names);

    //         window.location.href = window.location.href.replace("#", "");
    //     }
    // );

    // $(document).on("click", "#btn-layout-builder", function () {});

    // $(document).on("click", "#btn-layout-builder-reset", function () {
    //     localStorage.removeItem("site_layout");
    //     localStorage.removeItem("site_layout_dark");

    //     window.location.href = window.location.href.replace("#", "");
    // });

    $(window).on("load", function () {
        if (
            $("body").hasClass("horizontal-side-menu") &&
            $(window).width() > 768
        ) {
            if ($("body").hasClass("layout-container")) {
                $(".side-menu .side-menu-body").wrap(
                    '<div class="container"></div>'
                );
            } else {
                $(".side-menu .side-menu-body").wrap(
                    '<div class="container-fluid"></div>'
                );
            }
            setTimeout(function () {
                $(".side-menu .side-menu-body > ul").append(
                    '<li><a href="#"><span>سایر</span></a><ul></ul></li>'
                );
            }, 100);
            $(".side-menu .side-menu-body > ul > li").each(function () {
                var index = $(this).index(),
                    $this = $(this);
                if (index > 7) {
                    setTimeout(function () {
                        $(
                            ".side-menu .side-menu-body > ul > li:last-child > ul"
                        ).append($this.clone());
                        $this.addClass("d-none");
                    }, 100);
                }
            });
        }
    });

    $(document).on("click", '[data-attr="layout-builder-toggle"]', function () {
        $(".layout-builder").toggleClass("show");
        return false;
    });

    $.validator.addMethod(
        "filesize",
        function (value, element, param) {
            return this.optional(element) || element.files[0].size <= param;
        },
        "سایز تصویر نمی تواند بیشتر از دو مگابایت باشد"
    );
    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            return this.optional(element) || regexp.test(value);
        },
        "Please check your input."
    );

     $.validator.addMethod(
         "regex",
         function (value, element, regexp) {
             return this.optional(element) || regexp.test(value);
         },
         "Please check your input."
     );
     $("#loginForm").validate({
         rules: {
             password: {
                 required: true,
                 minlength:8,
                 regex: /^[a-zA-Z]+[a-zA-Z\d]*$/,
             },
             mobile: {
                 required: true,
                 regex: /^09[0-9]{9}$/,
             }
            
            
         },
         messages: {
             password: {
                 required: "لطفا رمز عبور خود را وارد نمایید",
                 minlength: "رمز عبور بایستی حداقل 8 کاراکتر باشد",
                  regex: "پسورد نمیتواند با عدد شروع شود",
             },
             mobile: {
                 required: "لطفا شماره موبایل خود را وارد نمایید",
                 regex: "موبایل دارای فرمت نامعتبر می باشد",
             },
           
         },
     });
     $("#add-plan").validate({
         rules: {
             name: {
                 required: true,
                 maxlength: 30,
             },
             time: {
                 required: true,
             },
             price: {
                 required: true,
             },
         },
         messages: {
             name: "لطفا عنوان فایل را وارد نمایید",
             time: "لطفا تعداد روزهای فعال بودن اشتراک را وارد نمایید",
             price: "لطفا قیمت اشتراک را وارد نمایید",
         },
     });
       $("#add-blog").validate({
           rules: {
               name: {
                   required: true,
               },
               link: {
                   regex: /^https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,}$/,
               },
               desc: {
                   required: true,
               },
           },
           messages: {
               name: "لطفا عنوان فایل را وارد نمایید",
               link:{regex: "لینک وارد شده صحیح نمیباشد"},
               desc: "لطفا توصیح برای بلاگ وارد نمایید",
           },
       });

    $(".add-actor").validate({
        rules: {
            fullname: {
                required: true,
                
            }
           
        },
        messages: {
            fullname: "لطفا عنوان فایل را وارد نمایید",
        },
    });

     $(".add-discount").validate({
         rules: {
             title: {
                 required: true,
             },
             percent: {
                 required: true,
             },
             code: {
                 required: true,
             },
             date: {
                 required: true,
             },
         },
         messages: {
             title: "لطفا عنوان را وارد نمایید",
             percent: "لطفا درصد تخفیف را وارد نمایید",
             code: "لطفا کد تخفیف را وارد نمایید",
             date: "لطفا  تاریخ را وارد نمایید",
         },
     });


    $(".add-video").validate({
        rules: {
            file: { required: true, accept: "mp4,mpga,mkv,3gp" },
        },
        messages: {
            file: {
                required: "فایل مورد نظر خود را انتخاب نمایید",
                accept: "فرمت فایل غیرمجاز می باشد",
            },
        },
    });
    
    $("#sendsms").validate({
        rules: {
            for: { required: true },
            title: "required",
            content: "required",
        },
        messages: {
            for: {
                required: "لطفا دریافت کننده را انتخاب کنید",
            },
            title: "لطفا عنوان پیام را وارد نمایید",
            content: "لطفا متن پیام را وارد نمایید",
        },
    });
    $("#upload-file").validate({
        rules: {
            title: {
                required: true,
                maxlength: 30,
            },
            type: "required",
            pic: {
                filesize: 200 * 1024,
                accept: "jpg|jpeg|png|JPG|JPEG|PNG",
            },
           

            desc: "required",
            "category[]": "required",
            "actors[]": "required",
            "writers[]": "required",
            "directors[]": "required",
            language: "required",
            season: {
                required: function (element) {
                    return $("#movie-type").val() == "series";
                },
            },
            section: {
                required: function (element) {
                    return $("#movie-type").val() == "series";
                },
            },
           
        },
        messages: {
            title: {
                required: "لطفا عنوان فایل را وارد نمایید",
                maxlength: "تعداد کاراکترها بیش از حد مجاز میباشد",
            },
            type: "محتوای فایل را انتخاب کنید",

            desc: "توضیحات برای فایل الزامی است",
            "category[]": "وارد کردن دسته بندی الزامی است",
            "actors[]": "لطفا اسامی بازیگران را وارد نمایید",
            "writers[]": "لطفا نام نویسنده را وارد نمایید",
            "directors[]": "لطفا نام کارگردان را وارد نمایید",

            language: "لطفا زبان فیلم را وارد نمایید",
            season: "شماره فصل سریال را وارد نمایید",
            section: "شماره قسمت سریال را وارد نمایید",
           
           
        },
    });

    $("#upload").click(function () {
        if ($("#upload-file").valid()) {
            $(this).val("در حال آپلود ...");
        }
    });
})(jQuery);

var dropifyOptions = {
    messages: {
        default:
            "فایل خود را کشیده و اینجا رها کنید یا برای انتخاب فایل کلیک کنید",
        replace:
            "فایل خود را کشیده و اینجا رها کنید یا برای تغییر فایل کلیک کنید",
        remove: "حذف",
        error: "اوپس،خطایی رخ داده است",
    },
    error: {
        fileSize: "فایل انتخابی شما بزرگتر از محدودیت حجم تعیین شده است",
        imageFormat: "تصویر دارای فرمت نامعتبر میباشد",
    },
};
var drEvent = $(".dropify").dropify(dropifyOptions);

function getClone(element) {
    element = $(element);
    let next = element.next(".row");

    next.append(`<div class=" col-md-3 image-box">
                        <div class="form-group">
                               <input type="file" name="images[]" class="dropify" data-default-file="" />
                    </div>
                   </div>`);
    $(".dropify").dropify(dropifyOptions);
}

function remove(el) {
    $(el).parent().remove();
}

function addFile(event, el) {
    event.preventDefault();
    let id = Math.random();
    var token = $('meta[name="_token"]').attr("content");
    let close =
        '<span style="left: 18px;position: absolute;color: red;z-index:5;padding:5px;cursor:pointer" onclick="remove(this)" ><i class="fa fa-times"></i></span>';
    $(el).prev().append(`
    <form class="video" action="#" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="${token}">
                <div class="files-wrapper">
      <div class="row position-relative">${close}
      
                                        <div class="form-group col-md-6">
                                            <div class="form-row">
                                                <div class="col-md-3">
                                                    <label for=""> فایل: </label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="file" name="file" id="file" class="dropify"
                                                        data-default-file="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="custom-control custom-checkbox custom-control">
                                                <input type="checkbox" id="${id}" name="quality[]" value="hd"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="${id}">کیفیت بالا</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control">
                                                <input type="checkbox" id="${
                                                    id + 1
                                                }" name="quality[]" value="md"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="${
                                                    id + 1
                                                }">کیفیت متوسط</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control">
                                                <input type="checkbox" id="${
                                                    id + 2
                                                }" name="quality[]" value="sd"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="${
                                                    id + 2
                                                }">کیفیت پایین</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                           <button class="btn btn-sm btn-primary text-white" type="submit" >آپلود</button>
                                            <div class="progress mt-3">
                                                <div class="progress-bar" role="progressbar" aria-valuenow=""
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                    0%
                                                </div>
                                            </div>
                                        </div>

                                    </div></div></form>`);
    $(".dropify").dropify(dropifyOptions);
}

function addCategory(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="${id}" name="category[]"
                                  value="${val}"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}

function addBCategory(event) {
     let val = $(event.target).prev().val();
     if (val !== "") {
         let id = Math.random();
         let wrapper = $(event.target).next();
         wrapper.append(`
         <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="${id}" name="category"
                                  value="${val}"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
     }
}

function addTag(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="${id}" name="tag[]"
                                 value="${val}"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}

function addActor(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="${id}" name="actor[]"
                                 value="${val}"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}

function addWriter(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="${id}" name="writer[]"
                                 value="${val}"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}

function addCreator(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="${id}" name="creator[]"
                                 value="${val}"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}

function addLanguage(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="${id}" name="language[]"
                                 value="${val}"
                                    class="custom-control-input" >
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}

function addSeason(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="${id}" name="season[]"
                                 value="${val}"
                                    class="custom-control-input" >
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}

function addSection(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="${id}" name="section[]"
                                 value="${val}"
                                    class="custom-control-input" >
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}
function addAward(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).next();
        wrapper.append(`
         <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="${id}" name="awards[]"
                                 value="${val}"
                                    class="custom-control-input" >
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}

function addQuality(event) {
    event.preventDefault();
    let val = $(event.target).prev().val();
    if (val !== "") {
        let id = Math.random();
        let wrapper = $(event.target).siblings(".wraper");
        wrapper.append(`
         <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="${id}" name="quality"
                                 value="${val}"
                                    class="custom-control-input" >
                                <label class="custom-control-label" for="${id}">${val}</label>
                            </div>
         `);
    }
}


