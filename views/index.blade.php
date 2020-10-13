<?php 
    $checkPackage = \App\Controllers\PackageController::verifyInstallation();
    if(!$checkPackage){ 
        echo "<script>window.location.href = '" . navigate('install') . "';</script>";
    } 
?>

<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" onclick="getDashboard()" href="#home" data-toggle="tab"><i class="fas fa-home mr-2"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="getHosts()" href="#hosts" data-toggle="tab"><i class="fas fa-server mr-2"></i>{{ __('Hosts') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="getUsers()" href="#users" data-toggle="tab"><i class="fas fa-users mr-2"></i>{{ __('Kullanıcılar') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="getFiles()" href="#files" data-toggle="tab"><i class="fas fa-file mr-2"></i>{{ __('Dosyalar') }}</a>
    </li>
</ul>
<div class="tab-content">

    <div id="home" class="tab-pane active">
        @include("pages.dashboard")
    </div>

    <div id="hosts" class="tab-pane">
        @include("pages.host")
    </div>

    <div id="users" class="tab-pane">
        @include("pages.users")
    </div>

    <div id="files" class="tab-pane">
        @include("pages.files")
    </div>

</div>

@component('modal-component',[
    "id" => "taskModal",
    "title" => "Görev İşleniyor",
])@endcomponent

<script>
    $('#taskModal').on('hidden.bs.modal', function (e) {
        $('#taskModal').find('.modal-body').html("");
    })

    if(location.hash === ""){
        getDashboard();
    }

    function onTaskSuccess(){
        showSwal('{{__("İsteğiniz başarıyla tamamlandı...")}}', 'success', 2000);
        setTimeout(function(){
            $('#taskModal').modal("hide"); 
        }, 2000);
    }

    function onTaskFail(){
        showSwal('{{__("İsteğiniz yerine getirilirken bir hata oluştu!")}}', 'error', 2000);
    }

</script>
