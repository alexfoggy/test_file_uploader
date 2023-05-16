$(document).ready(function () {


    var r = new Resumable({

        target: '/upload',
        chunkSize: 2 * 1024 * 1024,
        prioritizeFirstAndLastChunk: true,
        simultaneousUploads: 3,
        testChunks: false,
        throttleProgressCallbacks: 1,
        query: {_token: $('input[name=_token]').val()},
    });


    $(document).on('click', '[data-action]', function (e) {

        e.preventDefault();

        let action = $(this).attr('data-action');


        if (action == 'upload') {

            r.upload();

        } else if (action == 'pause') {

            r.pause();

        } else if (action == 'cancel') {

            r.cancel();

        }

    })


    var fileElement = document.getElementById('dropzone-file');

    r.assignBrowse(fileElement);


    r.on('fileAdded', function (file) {

        $('.action-buttons').show();

        $('.progress-resume-link').hide();

        $('.progress-pause-link').show();


        $('.resumable-list').append('<li class="resumable-file-' + file.uniqueIdentifier + '">Загрузка <span class="resumable-file-name"></span> <span class="resumable-file-progress"></span>');

        $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-name').html(file.fileName);

        r.upload();

    });


    r.on('pause', function () {

        $('.progress-resume-link').show();

        $('.progress-pause-link').hide();

    });


    r.on('complete', function () {

        $('.action-buttons').hide();

        $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').text('загружено');

    });

    r.on('fileSuccess', function (file, message) {

        $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('(загружен)');

    });

    r.on('fileError', function (file, message) {

        $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('(Ошибка: ' + message + ')');

    });

    r.on('fileProgress', function (file) {

        $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html(Math.floor(file.progress() * 100) + '%');

        $('.progress-bar').css({width: Math.floor(r.progress() * 100) + '%'});

    });

    r.on('cancel', function () {

        $('.resumable-file-progress').html('отменено');

    });

    r.on('uploadStart', function () {

        $('.progress-resume-link').hide();

        $('.progress-pause-link').show();

    });

});
