<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat cùng mọi người</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        ::-webkit-scrollbar {
            width: 2px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .container-fluid {
            height: 100vh;
            background-color: #f4f7f6;
            padding: 15px;
        }

        .container {
            background: white;
            height: 100%;
            border-radius: 10px;
            box-shadow: 1px 1px 10px 1px #0c0c0c57;
            padding: 15px;
        }

        .chat-app {
            height: 100%;
            overflow: scroll;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .chat-app::-webkit-scrollbar {
            display: none;
        }

        .col-list-user {
            border-right: 1px solid #e5e5e5;
            /* padding-right: 0; */
        }

        .list-users {
            margin-top: 10%;
            min-height: 550px;
            overflow: hidden;
        }

        .aa {
            height: 500px;
            overflow-y: auto;
        }

        .kk {
            margin-bottom: 5%;
        }

        .search {
            display: flex;
            justify-content: start;
            align-items: center;
            height: 35px;
        }

        .icon-search,
        .icon-send {
            width: 35px;
            height: 100%;
            background-color: #e0dddd;
            display: flex;
            justify-content: center;
            align-items: center;
            border-color: 1px solid #e0dddd;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .input-search,
        .input-message {
            width: 80%;
            height: 100%;
            font-size: 13px;
            text-indent: 5px;
            outline: none;
            border-left: none;
            border: 1px solid #e5e5e5;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .search .input-search::placeholder {
            font-size: 13px;
            color: gray;
        }

        .col-info-user {
            padding: 0;
            overflow: hidden;
        }

        .wrapper-user {
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 1%;
            box-shadow: 0 4px 2px -2px #80808024;
        }

        .info-user {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .btn-info-user:hover {
            border-radius: 10px;
            background: #e5e5e5;
        }

        .image-friend {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .status-active {
            display: flex;
            flex-direction: column;
            font-size: 14px;
            margin-left: 1%;
        }

        .status {
            font-size: 11px;
            color: gray;
        }

        .wrapper-content-message {
            min-height: 550px;
            overflow: hidden;
            padding: 10px 15px;
        }

        .wrapper-message {
            height: 40px;
            margin-bottom: 1%;
        }

        .icon-send {
            width: 40px;
            cursor: pointer;
        }

        .input-message {
            height: 100%;
            width: 100%;
            border-left: none;
        }

        .content-message {
            list-style: none;
            margin: 0;
            height: 500px;
            overflow-y: auto;
        }

        .clearfix {
            font-size: 13px;
            text-align: justify;
            width: 50%;
            clear: right;
            margin-bottom: 2%;
        }

        .clearfix .message {
            max-width: max-content;
            padding: 5px;
            border-radius: 10px;
        }

        .clearfix .me {
            background: #0084ff;
            color: white;
        }

        .clearfix .you {
            background: #e4e6eb;
            color: black;
        }

        .message-of-you {
            line-break: anywhere;
            text-align: left;
            float:right;
            display: flex;
            justify-content: end;
        }

        .info-me {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #e5e5e5;
            padding-top: 2%;
        }

        .status-active-me {
            flex-direction: unset;
            align-items: center;
            width: 80%;
        }

        .status-active-me .name-me {
            margin-left: 2%;
        }

        .log-out {
            width: 20%;
            text-align: right;
        }

        .log-out i {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row chat-app">
                <div class="col-4 col-list-user">
                    <div class="search">
                        <i class="fa fa-search icon-search"></i>
                        <input type="text" placeholder="Tìm kiếm bạn bè...." class="input-search">
                    </div>
                    <div class="list-users">
                        <div class="aa">
                            @foreach ($users as $user)
                                <div class="info-user kk btn-info-user" data-to="{{ $user->id }}">
                                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                                        alt="" class="image-friend">
                                    <div class="status-active">
                                        <span class="name-friend bold-name{{$user->id}}">{{ $user->name }}</span>
                                        <span class="status">Online</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="info-me">
                            <div class="status-active status-active-me">
                                <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg"
                                alt="" class="image-friend">
                                <span class="font-weight-bold name-me">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="log-out">
                                <a href="{{ url('/logout') }}">
                                    <i class="fa fa-sign-out" id="sign-out" aria-hidden="true" data-me="{{ Auth::user()->id }}"></i>
                                </a>
                            </div>
                    </div>
                </div>
                <div class="col-8 col-info-user">
                    <div class="col-12 wrapper-user">
                        <div class="info-user" id="info-friend">
                            <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                                alt="" class="image-friend">
                            <div class="status-active ">
                                <span class="font-weight-bold info-name-friend">Trần Đình Nghĩa</span>
                                <span class="status">Online</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wrapper-content-message">
                        <ul class="content-message">
                            {{-- <li class="clearfix">
                                <p class="message me">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Laudantium molestias
                                    omnis praesentium vel eius voluptates voluptatibus aut, distinctio ex adipisci at
                                    eligendi quas ea repudiandae repellat minima vitae provident esse. Ullam
                                    perspiciatis quasi eos aperiam dolor? Iste, architecto tempore nesciunt,
                                    consequuntur, esse dolores similique quibusdam odit soluta aperiam earum nemo
                                    deleniti adipisci reprehenderit. Itaque ratione, pariatur saepe omnis ab nobis
                                    consectetur nisi amet odio sequi fugit, veniam adipisci aliquid culpa excepturi.
                                    Magni odit dolor, repellendus ex quaerat dolore illo non doloremque. Iure
                                    accusantium facilis voluptates quos nihil voluptas magnam omnis accusamus non
                                    veritatis quasi sunt, nemo numquam necessitatibus? Aliquam, eius.</p>
                            </li>
                            <li class="clearfix message-of-you">
                                <p class="message you">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Laudantium molestias
                                    omnis praesentium vel eius voluptates voluptatibus aut, distinctio ex adipisci at
                                    eligendi quas ea repudiandae repellat minima vitae provident esse. Ullam
                                    perspiciatis quasi eos aperiam dolor? Iste, architecto tempore nesciunt,
                                    consequuntur, esse dolores similique quibusdam odit soluta aperiam earum nemo
                                    deleniti adipisci reprehenderit. Itaque ratione, pariatur saepe omnis ab nobis
                                    consectetur nisi amet odio sequi fugit, veniam adipisci aliquid culpa excepturi.
                                    Magni odit dolor, repellendus ex quaerat dolore illo non doloremque. Iure
                                    accusantium facilis voluptates quos nihil voluptas magnam omnis accusamus non
                                    veritatis quasi sunt, nemo numquam necessitatibus? Aliquam, eius.</p>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-12 d-flex justify-center align-items-center wrapper-message">
                        <i class="fa fa-paper-plane icon-send" aria-hidden="true"></i>
                        <input type="text" class="input-message" id="send-message" placeholder="Nhập tin nhắn">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    $(document).ready(function() {
        let audio = new Audio();
        audio.src = "/sound.mp3";

        // let timeout = setInterval(function(){
        //     var title = document.title;
        //     document.title = (title == "test" ? "none" : "test");
        // }, 1000);

        $('.btn-info-user').on('click', function() {
            let id = $(this).data('to');
            let id_me = $("#sign-out").attr('data-me');

            // clearInterval(timeout);

            $('#info-friend').attr('data-info-friend', id);
            
            $('.content-message').empty();
            $('.bold-name' + id).css({
                'font-weight': 'unset'
            });

            $.ajax({
                type: "POST",
                url: "/show-friend",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "JSON",
                success: function (response) {
                    $('.info-name-friend').text(response.data.user.name);
                    $.each(response.data.messages, function(key,value) {
                        if(value.to == id && value.form == id_me ) {
                            $('.content-message').append(
                                '<li class="clearfix">' +
                                    '<p class="message me">' + value.text + '</p>'
                                +'</li>'
                            );
                        }else if(value.form == id && value.to == id_me){
                            $('.content-message').append(
                                '<li class="clearfix message-of-you">' +
                                    '<p class="message you">' + value.text + '</p>'
                                +'</li>'
                            );
                        }
                    })
                }
            });
        });

        $(document).on('keyup', '#send-message', function(e) {
            if (e.keyCode == 13) {
                let text = $(this).val();
                let to = $('#info-friend').attr('data-info-friend');

                $('.content-message').append(
                            '<li class="clearfix">' +
                                '<p class="message me">' + text + '</p>'
                            +'</li>'
                );
                $('#send-message').val('');

                $.ajax({
                    type: "POST",
                    url: "/send-message",
                    data: {
                        to: to,
                        text: text,
                        _token: "{{ csrf_token() }}"
                    },

                    success: function(response) {}
                });
            }
        });

        function addMessage(data) {
          
            let id_me = $("#sign-out").attr('data-me'); //id của tk đang đăng nhập hiện tại
            let form = $('#info-friend').attr('data-info-friend'); // id của người mà mình đang bấm xem họ

            if (id_me == data.dataUser.to && form == data.dataUser.id) {
                $('.content-message').append(
                    '<li class="clearfix message-of-you">' +
                        '<p class="message you">' + data.dataUser.text + '</p>'
                    +'</li>'
                );
            } else if (id_me == data.dataUser.to && form != data.dataUser.id) {
                $('.bold-name' + data.dataUser.id).css({
                    'font-weight': 'bold'
                })
            }
            audio.play();
        }
        var pusher = new Pusher('e83a29dba35ea6d67708', {
            encrypted: true,
            cluster: 'mt1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('chat-real', addMessage);
    });
</script>

</html>
