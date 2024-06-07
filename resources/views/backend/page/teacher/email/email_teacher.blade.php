
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<style>
    .container_logo {
        margin-top: 10px;
    }

    .container_logo a {
        font-weight: 600;
        text-decoration: none;
    }
    .box_header_content{
        background: #ff7a59;
        margin-top: 10px;
        padding:20px;
    }
    .box_header_content svg{
        background: transparent;
    }
    .container_body_content{
        padding: 40px 30px;
    }
    .box_login_link{
        margin-top: 30px;
    }
    .box_login_link a{
        padding: 13px 30px;
        background: #ff7a59;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
    }
    .email_template{
        padding: 15px;
        background-color: #f2f2f2;
    }
    .container_body_content{
        background-color: #fff;
    }
    .container_footer_content{
        padding-top: 20px;
        padding-bottom: 10px;
    }
    .container_footer_content p{
        font-weight: 600;
    }
    .container_footer_content a{
        margin: 0px 10px;
    }
</style>

<body>
    <div class="container_email_template">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 email_template">
                    <div class="container_logo d-flex justify-content-between align-items-center">
                        <div>
                            <a href="https://vue.edu.vn/"><img
                                    src="https://vue.edu.vn/wp-content/uploads/2024/05/logo-1.png" alt=""></a>
                        </div>
                        <div>
                            <a href="https://vue.edu.vn/">View In Website</a>
                        </div>
                    </div>
                    <div class="container_content_email">
                        <div class="box_header_content text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                                fill="transparent">
                                <path
                                    d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z"
                                    stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22 6L12 13L2 6" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="container_body_content">
                            <h4 class="text-center">Bạn có học viên mới </h4>
                            <p class="text-center">Dưới đây là thông tin học viên</p>
                           <div class="d-flex justify-content-center">
                            <ul >
                                <li>Họ và tên: {{ $data->student_lastname }} {{ $data->student_firstname }}</li>
                                <li>Số điện thoại: {{ $data->student_phone }} </li>
                                <li>Email: {{ $data->student_email }} </li>
                            </ul>
                           </div>
                           {{-- <div class="box_login_link text-center">
                            <a href=""></a>
                           </div> --}}
                        </div>
                        <div class="container_footer_content">
                            <p class="text-center">Liên hệ với chúng tôi</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#21272A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2 12H22" stroke="#21272A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2V2Z" stroke="#21272A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </a>
                                <a href="mailto:vicuni@vue.edu.vn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="#21272A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </a>
                                <a href="tel:0924355588">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M19.2997 10.1069C19.3237 7.21494 16.8607 4.56394 13.8097 4.19694C13.7438 4.18872 13.6781 4.17872 13.6127 4.16694C13.4594 4.13758 13.3038 4.12086 13.1477 4.11694C12.5217 4.11694 12.3547 4.55694 12.3107 4.81794C12.2677 5.07294 12.3087 5.28794 12.4317 5.45494C12.6387 5.73594 13.0037 5.78594 13.2967 5.82594C13.3817 5.83794 13.4627 5.84894 13.5307 5.86394C16.2727 6.47694 17.1957 7.43994 17.6467 10.1589C17.6577 10.2249 17.6627 10.3069 17.6687 10.3939C17.6887 10.7189 17.7287 11.3949 18.4557 11.3949C18.5157 11.3949 18.5817 11.3899 18.6497 11.3799C19.3257 11.2769 19.3047 10.6589 19.2947 10.3619C19.2917 10.2779 19.2887 10.1989 19.2967 10.1459C19.2983 10.1327 19.299 10.1193 19.2987 10.1059L19.2997 10.1069Z" fill="#21272A"/>
                                        <path d="M12.9698 3.136C13.0518 3.142 13.1278 3.148 13.1918 3.157C17.6948 3.85 19.7658 5.983 20.3388 10.521C20.3488 10.598 20.3508 10.692 20.3518 10.791C20.3578 11.146 20.3698 11.884 21.1618 11.899H21.1858C21.4348 11.899 21.6318 11.824 21.7738 11.676C22.0198 11.419 22.0038 11.036 21.9888 10.728C21.9858 10.652 21.9828 10.581 21.9828 10.518C22.0408 5.878 18.0228 1.669 13.3868 1.513C13.3668 1.513 13.3488 1.513 13.3308 1.516C13.3125 1.5183 13.2942 1.5193 13.2758 1.519C13.2288 1.519 13.1728 1.515 13.1118 1.511C13.0398 1.506 12.9568 1.5 12.8718 1.5C12.1338 1.5 11.9938 2.025 11.9758 2.338C11.9348 3.061 12.6338 3.112 12.9698 3.136ZM20.1218 16.386C20.0252 16.3126 19.9295 16.2379 19.8348 16.162C19.3428 15.766 18.8198 15.402 18.3148 15.049L17.9998 14.829C17.3518 14.374 16.7698 14.153 16.2198 14.153C15.4778 14.153 14.8318 14.563 14.2978 15.37C14.0618 15.728 13.7748 15.902 13.4218 15.902C13.1766 15.8934 12.936 15.8331 12.7158 15.725C10.6258 14.777 9.13177 13.323 8.27777 11.404C7.86477 10.476 7.99878 9.87 8.72477 9.376C9.13777 9.096 9.90477 8.575 9.85177 7.576C9.78977 6.443 7.28877 3.032 6.23477 2.645C5.78419 2.48064 5.29029 2.47923 4.83877 2.641C3.62777 3.048 2.75977 3.764 2.32477 4.709C1.90477 5.623 1.92477 6.696 2.37877 7.812C3.69377 11.039 5.54177 13.853 7.87277 16.175C10.1538 18.448 12.9578 20.309 16.2058 21.708C16.4988 21.834 16.8058 21.903 17.0308 21.953C17.1068 21.97 17.1728 21.985 17.2208 21.998C17.2472 22.0051 17.2744 22.0088 17.3018 22.009H17.3278C18.8558 22.009 20.6908 20.613 21.2538 19.022C21.7478 17.628 20.8458 16.939 20.1218 16.386ZM13.6458 6.823C13.3848 6.829 12.8398 6.843 12.6488 7.397C12.5588 7.657 12.5698 7.881 12.6808 8.066C12.8428 8.336 13.1538 8.42 13.4358 8.466C14.4608 8.63 14.9878 9.196 15.0928 10.249C15.1418 10.739 15.4728 11.082 15.8958 11.082C15.9279 11.082 15.9599 11.0799 15.9918 11.076C16.5018 11.016 16.7488 10.641 16.7268 9.962C16.7348 9.254 16.3648 8.45 15.7338 7.81C15.1018 7.168 14.3398 6.806 13.6458 6.823Z" fill="#21272A"/>
                                        </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>

