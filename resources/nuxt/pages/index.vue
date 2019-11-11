<template>
    <div>
        phone <input type="tel"/>

        <button onclick="auth()">auth</button>
        <label>인증 여부 :</label>

        <div id="recaptcha-container"></div>


        <script src="index.js"></script>
        <!--        <div class="container">-->

        <!--            <header>-->
        <!--                <h1>v-markdown-editor</h1>-->
        <!--                <h4>Markdown Editor component for Vue.js</h4>-->
        <!--            </header>-->


        <!--            <div class="form-group">-->
        <!--                <markdown-editor toolbar='redo undo | bold italic strikethrough heading | image link | numlist bullist code quote | preview fullscreen'-->
        <!--                                 buttonClass="btn btn-outline-success"></markdown-editor>-->
        <!--            </div>-->

        <!--        </div>-->

    </div>
</template>
<script src="https://www.gstatic.com/firebasejs/4.5.1/firebase.js"></script>

<script>
    // import VueMarkdown from 'vue-markdown' // production
    var recaptcha = new firebase.auth.RecaptchaVerifier('recaptcha-container',{
        'size':'invisible',
        'callback':function(responce){

        }
    });

    var config = {
        apiKey: "AIzaSyCDBA9as8Rv5nqy2JwX6Ja1E9ziOKJyazI",
        authDomain: "fir-phone-number-auth.firebaseapp.com",
        databaseURL: "https://fir-phone-number-auth.firebaseio.com",
        projectId: "fir-phone-number-auth",
        storageBucket: "",
        messagingSenderId: "541176602335"
    };

    firebase.initializeApp(config);

    export default {
        data() {
            return {
                value: 'Hello world'
            }
        },
        methods: {
            auth() {
                var number = '+84' + document.querySelector('input').value;

                firebase.auth().signInWithPhoneNumber(number, this.ecaptcha).then(function (e) {
                    console.log('문자 전송 성공');


                    var
                        code = prompt('인증 번호를 입력해주세요', '');


                    if (code === null) return;


                    e.confirm(code).then(function (result) {
                        console.log('인증 성공', result.user);

                        document.querySelector('label').textContent += '성공 ' + result.user.phoneNumber;

                    }).catch(function (error) {
                        console.error('인증 실패', error);

                    });

                })
                    .catch(function (error) {
                        console.error('문자 전송 실패', error);

                    });
            }
        };
</script>
<style scoped>
    html, body {
        background-color: #fefefe;
        display: flex;
        flex-direction: column;
        height: 100%;
        margin: 0;
    }

    header {
        margin-top: 65px;
        text-align: center;
        padding: 6px;
    }

    header h1 {
        text-align: center;
        margin: 0 0 5px 0;
        font-weight: 900;
        font-size: 4rem;
        color: #34495e;
        font-family: 'Hammersmith One', sans-serif;
    }

    header h4 {
        color: #9E9E9E;
        text-align: center;
        margin: 0 0 35px 0;
        font-weight: 400;
        font-size: 24px;
        font-family: 'Athiti', sans-serif;
    }

    main {
        max-width: 525px;
        width: 100%;
        padding-top: 34px;
        margin: auto;
        height: 410px;
        font-size: 1rem;
        padding-bottom: 79px;
    }

    a {
        text-decoration: none;
        color: #34495e;
    }

    p {
        word-spacing: 0.05em;
    }

    footer {
        padding: 30px 0;
        color: #fff;
        text-align: center;
        font-weight: 300;
        font-family: 'Roboto', sans-serif;
        background: #34495e;
        font-size: 0.9rem;
        width: 100%;
        bottom: 0;
        left: 0;
    }

    footer .social-icon {
        margin: 0 7px;
    }

    footer .social-icon svg {
        width: 30px;
        height: 30px;
    }

    a:hover, footer .social-icon svg:hover {
        opacity: 0.6;
    }

    footer a {
        font-weight: 400;
        color: #fff;
    }

    footer img {
        height: 50px;
        margin-right: 8px;
    }


    code[data-lang], pre[data-lang], pre[data-lang] code {
        text-shadow: 0 1px rgba(255, 255, 255, 0.3);
        direction: ltr;
        text-align: left;
        white-space: pre;
        word-spacing: normal;
        word-break: normal;
        word-wrap: normal;
        line-height: 1.5;
        -moz-tab-size: 3;
        -o-tab-size: 3;
        tab-size: 3;
        -webkit-hyphens: none;
        -moz-hyphens: none;
        -ms-hyphens: none;
        hyphens: none;
        border: none;
    }

    pre[data-lang] {
        padding: 1em;
        margin: .5em 0;
        overflow: auto;
        border-radius: .3em
    }

    :not(pre) > code[data-lang], pre[data-lang] {
        background: #eee
    }

    :not(pre) > code[data-lang] {
        padding: .1em;
        border-radius: .3em;
        white-space: normal
    }
</style>
