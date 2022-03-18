@extends('layouts.app', ['title' => __('Restaurant Menu Management')])
@section('admin_title')
    {{__('Menu')}}
@endsection
@section('content')
    
    
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            <div class="row align-items-center py-4">
                <!--<div class="col-lg-6 col-7">
                </div>-->
                <div class="col-lg-12 col-12 text-right">
                    @if (isset($hasMenuPDf)&&$hasMenuPDf)
                        <a target="_blank" href="{{ route('menupdf.download')}}" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i> {{ __('PDF Menu') }}</a>
                    @endif
                    <button class="btn btn-icon btn-1 btn-sm btn-info" type="button" data-toggle="modal" data-target="#modal-items-category" data-toggle="tooltip" data-placement="top" title="{{ __('Add new category')}}">
                        <span class="btn-inner--icon"><i class="fa fa-plus"></i> {{ __('Add new category') }}</span>
                    </button>
                    @if($canAdd)
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-import-items" onClick=(setRestaurantId({{ $restorant_id }}))>
                        <span class="btn-inner--icon"><i class="fa fa-file-excel"></i> {{ __('Import from CSV') }}</span>
                    </button>
                    @endif
                    @if(config('settings.enable_miltilanguage_menus'))
                        @include('items.partials.languages')
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-0">{{ __('Restaurant Menu Management') }} @if(config('settings.enable_miltilanguage_menus')) ({{ $currentLanguage}}) @endif</h3>
                                    </div>
                                    <div class="col-auto">
                                        <!--<button class="btn btn-icon btn-1 btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-items-category" data-toggle="tooltip" data-placement="top" title="{{ __('Add new category')}}">
                                            <span class="btn-inner--icon"><i class="fa fa-plus"></i> {{ __('Add new category') }}</span>
                                        </button>
                                        @if($canAdd)
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-import-items" onClick=(setRestaurantId({{ $restorant_id }}))>
                                                <span class="btn-inner--icon"><i class="fa fa-file-excel"></i> {{ __('Import from CSV') }}</span>
                                            </button>
                                        @endif
                                        @if(config('settings.enable_miltilanguage_menus'))
                                            @include('items.partials.languages')
                                        @endif-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="col-12">
                        @include('partials.flash')
                    </div>
                    <?php //var_dump(count($categories)); ?>
                    <div class="card-body">
                        @if(count($categories)==0)
                            <div class="col-lg-3" >
                                <a  data-toggle="modal" data-target="#modal-items-category" data-toggle="tooltip" data-placement="top" title="{{ __('Add new category')}}">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('images') }}/default/add_new_item.jpg" alt="...">
                                        <div class="card-body">
                                            <h3 class="card-title text-primary text-uppercase">{{ __('Add first category') }}</h3> 
                                        </div>
                                    </div>
                                </a>
                                <br />
                            </div>
                            @include('items.partials.modals', ['restorant_id' => $restorant_id,'img'=>''])
                        @endif
                       
                        
                        
                        @foreach ($categories as $index => $category)
                        @include('items.partials.modals', ['restorant_id' => $restorant_id,'img'=>$category->logom])
                        @if($category->active == 1)
                        <div class="alert alert-default">
                            <div class="row">
                                <div class="col">
                                    <span class="h1 font-weight-bold mb-0 text-white">{{ $category->name }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <script>
                                            function setSelectedCategoryId(id){
                                                $('#category_id').val(id);
                                            }

                                            function setRestaurantId(id){
                                                $('#res_id').val(id);
                                            }

                                        </script>
                                        @if($canAdd)
                                            <button class="btn btn-icon btn-1 btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-new-item" data-toggle="tooltip" data-placement="top" title="{{ __('Add item') }} in {{$category->name}}" onClick=(setSelectedCategoryId({{ $category->id }})) >
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                                            </button>
                                        @else
                                            <a href="{{ route('plans.current')}}" class="btn btn-icon btn-1 btn-sm btn-warning" type="button"  >
                                                <span class="btn-inner--icon"><i class="fa fa-plus"></i> {{ __('Menu size limit reaced') }}</span>
                                            </a>
                                        @endif
                                        <button class="btn btn-icon btn-1 btn-sm btn-warning" type="button" id="edit" data-toggle="modal" data-target="#modal-edit-category" data-toggle="tooltip" data-placement="top" title="{{ __('Edit category') }} {{ $category->name }}" data-id="<?= $category->id ?>" data-image="<?= $category->logom ?>"  data-name="<?= $category->name ?>" >
                                            <span class="btn-inner--icon"><i class="fa fa-edit"></i></span>
                                        </button>

                                       

                                        <form action="{{ route('categories.destroy', $category) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-icon btn-1 btn-sm btn-danger" type="button" onclick="confirm('{{ __("Are you sure you want to delete this category?") }}') ? this.parentElement.submit() : ''" data-toggle="tooltip" data-placement="top" title="{{ __('Delete') }} {{$category->name}}">
                                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                                            </button>
                                        </form>

                                        @if(count($categories)>1)
                                            <div style="margin-left: 10px; margin-right: 10px">|</div>
                                        @endif

                                         <!-- UP -->
                                         @if ($index!=0)
                                            <a href="{{ route('items.reorder',['up'=>$category->id]) }}"  class="btn btn-icon btn-1 btn-sm btn-success" >
                                                <span class="btn-inner--icon"><i class="fas fa-arrow-up"></i></span>
                                            </a>
                                         @endif
                                         

                                        <!-- DOWN -->
                                        @if ($index+1!=count($categories))
                                            <a href="{{ route('items.reorder',['up'=>$categories[$index+1]->id]) }}" class="btn btn-icon btn-1 btn-sm btn-success">
                                                <span class="btn-inner--icon"><i class="fas fa-arrow-down"></i></span>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($category->active == 1)
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="row row-grid">
                                    @foreach ( $category->items as $item)
                                        <div class="col-lg-3">
                                            <a href="{{ route('items.edit', $item) }}">
                                                <div class="card">
                                                    <img class="card-img-top" src="{{ $item->logom }}" alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title text-primary text-uppercase">{{ $item->name }}</h3>
                                                        <p class="card-text description mt-3">{{ $item->description }}</p>

                                                        <span class="badge badge-primary badge-pill">@money($item->price, config('settings.cashier_currency'),config('settings.do_convertion'))</span>

                                                        <p class="mt-3 mb-0 text-sm">
                                                            @if($item->available == 1)
                                                            <span class="text-success mr-2">{{ __("AVAILABLE") }}</span>
                                                            @else
                                                            <span class="text-danger mr-2">{{ __("UNAVAILABLE") }}</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <br/>
                                            </a>
                                        </div>
                                    @endforeach
                                    @if($canAdd)
                                    <div class="col-lg-3" >
                                        <a   data-toggle="modal" data-target="#modal-new-item" data-toggle="tooltip" data-placement="top" href="javascript:void(0);" onclick=(setSelectedCategoryId({{ $category->id }}))>
                                            <div class="card">
                                                <img class="card-img-top" src="{{ asset('images') }}/default/add_new_item.jpg" alt="...">
                                                <div class="card-body">
                                                    <h3 class="card-title text-primary text-uppercase">{{ __('Add item') }}</h3>
                                                </div>
                                            </div>
                                        </a>
                                        <br />
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
$("[data-target='#modal-edit-category']").on('click',function() {
    
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    var image = $(this).attr('data-image');
    
    // alert(image);
    // $("#cat_image_edit").attr("src",image);
    // $('#my_id').attr('src',image);
    $("#cat_name").val(name);
    $("#previewImg").attr("src",image);
    $("#form-edit-category").attr("action", "/categories/"+id);

});

            $(document).on('change','#imgfile11', function() {
                let id = $(this).attr("name");
                // console.log("name",$(this).attr("name"));
                imagesPreview(this, 'div.gallery',id);
            });
            
            $(document).on('change','#imgfileItem', function() {
                let id = $(this).attr("name");
                // console.log("name",$(this).attr("name"));
                imagesPreviewItem(this, 'div.gallery',id);
            });

            function imagesPreview(input, placeToInsertImagePreview,id){
                console.log("the id",id);
                if (input.files) {
                    var filesAmount = input.files.length;
                    let i = 0;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                         
                        reader.onload = function(event) {
                            // $($.parseHTML('<img id="previewImg" width="100" height="100">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                            // $("."+id).attr('src', event.target.result);
                            $("#previewImg").attr('src', event.target.result);
                            // $("#"+this.active_el+"Modal")
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }
            
            function imagesPreviewItem(input, placeToInsertImagePreview,id){
                console.log("the id",id);
                if (input.files) {
                    var filesAmount = input.files.length;
                    let i = 0;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                         
                        reader.onload = function(event) {
                            // $($.parseHTML('<img id="previewImg" width="100" height="100">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                            // $("."+id).attr('src', event.target.result);
                            $("#previewImgItem").attr('src', event.target.result);
                            // $("#"+this.active_el+"Modal")
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }


            $('#modal-new-item').on('hidden.bs.modal', function () {
                $("#imgfileItem").val('');
                $("#previewImgItem").attr('src',"https://www.fastcat.com.ph/wp-content/uploads/2016/04/dummy-post-square-1-768x768.jpg");
            });

            $('#modal-edit-category').on('hidden.bs.modal', function () {
                $("#imgFile").val('');
                $("#previewImg").attr('src',"https://www.fastcat.com.ph/wp-content/uploads/2016/04/dummy-post-square-1-768x768.jpg");
            });

        function previewFile(input){
            
            var file = $("input[type=file]").get(0).files[0];
            console.log("file",file);
            if(file){
                var reader = new FileReader();
    
                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }
    
                reader.readAsDataURL(file);
            }
        }
</script>
@endsection