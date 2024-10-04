@extends('layouts.main')
@section('content')

<head>
    <title>Who are Ultrasonic</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">About Us</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/#featuredProducts">Pages</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<style>
    .responsive-container-block {
        min-height: 75px;
        height: fit-content;
        width: 100%;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        display: flex;
        flex-wrap: wrap;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
        justify-content: flex-start;
    }

    a {
        text-decoration-line: none;
        text-decoration-thickness: initial;
        text-decoration-style: initial;
        text-decoration-color: initial;
    }

    .text-blk {
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        line-height: 25px;
    }

    .responsive-container-block.bigContainer {
        padding-top: 10px;
        padding-right: 30px;
        background-color: #3705021f;
        padding-bottom: 10px;
        padding-left: 30px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px 50px 10px 50px;
    }

    .mainImg {
        color: black;
        width: 100%;
        height: 30rem;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .text-blk.headingText {
        font-size: 4rem;
        font-weight: 700;
        line-height: 30px;
        color: rgb(222 224 235 / 65%);
        text-shadow: 5px 3px 6px;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 5px;
        margin-left: 0px;
    }

    .allText {
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        width: 40%;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    }

    .text-blk.subHeadingText {
        color: whitesmoke;
        font-size: 26px;
        line-height: 32px;
        font-weight: 700;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 15px;
        margin-left: 0px;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    .text-blk.description {
        font-size: 18px;
        line-height: 26px;
        color: whitesmoke;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 50px;
        margin-left: 0px;
        font-weight: 400;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    .explore {
        font-size: 16px;
        line-height: 28px;
        color: whitesmoke;
        border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
        border-left-width: 2px;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: rgba(32, 26, 60, 0.712);
        border-right-color: rgba(32, 26, 60, 0.712);
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        cursor: pointer;
        background-color: rgb(75 20 2 / 32%);
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        padding-top: 8px;
        padding-right: 40px;
        padding-bottom: 8px;
        padding-left: 40px;
    }

    .explore:hover {
        background-color: rgb(82, 21, 91);
        color: white;
    }

    .responsive-container-block.Container {
        margin-top: 80px;
        margin-right: auto;
        margin-bottom: 50px;
        margin-left: auto;
        justify-content: center;
        align-items: center;
        max-width: 1320px;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
    }

    .responsive-container-block.Container.bottomContainer {
        flex-direction: row-reverse;
        align-items: flex-start;
        margin-top: 80px;
        margin-right: auto;
        margin-bottom: 50px;
        margin-left: auto;
        position: static;
    }

    .allText.aboveText {
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 40px;
    }

    .allText.bottomText {
        margin-top: 0px;
        margin-right: 40px;
        margin-bottom: 0px;
        margin-left: 0px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        padding-top: 0px;
        padding-right: 15px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    .purpleBox {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        max-width: 430px;
        background-color: rgba(15, 38, 68, 0.645);
        padding-top: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        padding-left: 20px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        position: absolute;
        bottom: -35px;
        left: -8%;
    }

    .purpleText {
        font-size: 18px;
        line-height: 26px;
        color: white;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 10px;
        margin-left: 0px;
    }

    .ultimateImg {
        width: 50%;
        position: relative;
    }

    @media (max-width: 1024px) {
        .responsive-container-block.Container {
            max-width: 850px;
        }

        .mainImg {
            width: 55%;
            height: auto;
        }

        .allText {
            width: 40%;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 20px;
        }

        .responsive-container-block.bigContainer {
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
        }

        .responsive-container-block.Container.bottomContainer {
            margin-top: 80px;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
        }

        .responsive-container-block.Container {
            max-width: 830px;
        }

        .allText.aboveText {
            margin-top: 30px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 40px;
        }

        .allText.bottomText {
            margin-top: 30px;
            margin-right: 40px;
            margin-bottom: 0px;
            margin-left: 0px;
            text-align: left;
        }

        .text-blk.headingText {
            text-align: center;
        }

        .allText.aboveText {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .text-blk.subHeadingText {
            text-align: left;
            font-size: 26px;
            line-height: 32px;
        }

        .text-blk.description {
            text-align: left;
            line-height: 24px;
        }

        .explore {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .responsive-container-block.bigContainer {
            padding-top: 10px;
            padding-right: 30px;
            padding-bottom: 10px;
            padding-left: 30px;
        }

        .responsive-container-block.Container {
            justify-content: space-evenly;
        }

        .purpleBox {
            bottom: 10%;
        }

        .responsive-container-block.Container.bottomContainer {
            padding-top: 10px;
            padding-right: 0px;
            padding-bottom: 10px;
            padding-left: 0px;
            max-width: 930px;
        }

        .allText.bottomText {
            width: 40%;
        }

        .purpleBox {
            bottom: auto;
            left: -10%;
            top: 70%;
        }

        .mainImg {
            width: 100%;
        }

        .text-blk.headingText {
            text-align: left;
        }
    }

    @media (max-width: 768px) {
        .allText {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .responsive-container-block.Container {
            flex-direction: column;
            height: auto;
        }

        .text-blk.headingText {
            text-align: center;
        }

        .text-blk.subHeadingText {
            text-align: center;
            font-size: 24px;
        }

        .text-blk.description {
            text-align: center;
            font-size: 18px;
        }

        .allText {
            margin-top: 40px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .allText.aboveText {
            margin-top: 40px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .responsive-container-block.Container {
            margin-top: 80px;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
        }

        .responsive-container-block.Container.bottomContainer {
            margin-top: 50px;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
        }

        .allText.bottomText {
            margin-top: 40px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .mainImg {
            height: 23rem;
            width: 100%;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: -70px;
            margin-left: 0px;
        }

        .responsive-container-block.Container.bottomContainer {
            flex-direction: column;
        }

        .ultimateImg {
            width: 100%;
        }

        .purpleBox {
            position: static;
        }

        .allText.bottomText {
            width: 100%;
            align-items: flex-start;
        }

        .text-blk.headingText {
            text-align: left;
        }

        .text-blk.subHeadingText {
            text-align: left;
        }

        .text-blk.description {
            text-align: left;
        }

        .ultimateImg {
            position: static;
        }

        .mainImg {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .ultimateImg {
            position: relative;
        }

        .purpleBox {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            position: absolute;
            left: 0px;
            top: 80%;
        }

        .allText.bottomText {
            margin-top: 100px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }
    }

    @media (max-width: 500px) {
        .responsive-container-block.Container {
            padding-top: 10px;
            padding-right: 0px;
            padding-bottom: 10px;
            padding-left: 0px;
            width: 100%;
            max-width: 100%;
        }

        .mainImg {
            height: 23rem;
            width: 100%;
        }

        .responsive-container-block.bigContainer {
            padding-top: 10px;
            padding-right: 25px;
            padding-bottom: 10px;
            padding-left: 25px;
        }

        .text-blk.subHeadingText {
            font-size: 24px;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            line-height: 28px;
        }

        .text-blk.description {
            font-size: 16px;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            line-height: 22px;
        }

        .allText {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            width: 100%;
        }

        .allText.bottomText {
            margin-top: 50px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            padding: 0 0 0 0;
            margin: 30px 0 0 0;
        }

        .ultimateImg {
            position: static;
        }

        .purpleBox {
            position: static;
        }

        .stars {
            width: 55%;
        }

        .allText.bottomText {
            margin-top: 75px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .responsive-container-block.bigContainer {
            padding-top: 10px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-left: 20px;
        }

        .purpleText {
            font-size: 16px;
            line-height: 22px;
        }

        .explore {
            padding: 6px 35px 6px 35px;
            font-size: 15px;
        }
    }


    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap');

    .wk-desk-1 {
        width: 8.333333%;
    }

    .wk-desk-2 {
        width: 16.666667%;
    }

    .wk-desk-3 {
        width: 25%;
    }

    .wk-desk-4 {
        width: 33.333333%;
    }

    .wk-desk-5 {
        width: 41.666667%;
    }

    .wk-desk-6 {
        width: 50%;
    }

    .wk-desk-7 {
        width: 58.333333%;
    }

    .wk-desk-8 {
        width: 66.666667%;
    }

    .wk-desk-9 {
        width: 75%;
    }

    .wk-desk-10 {
        width: 83.333333%;
    }

    .wk-desk-11 {
        width: 91.666667%;
    }

    .wk-desk-12 {
        width: 100%;
    }

    @media (max-width: 1024px) {
        .wk-ipadp-1 {
            width: 8.333333%;
        }

        .wk-ipadp-2 {
            width: 16.666667%;
        }

        .wk-ipadp-3 {
            width: 25%;
        }

        .wk-ipadp-4 {
            width: 33.333333%;
        }

        .wk-ipadp-5 {
            width: 41.666667%;
        }

        .wk-ipadp-6 {
            width: 50%;
        }

        .wk-ipadp-7 {
            width: 58.333333%;
        }

        .wk-ipadp-8 {
            width: 66.666667%;
        }

        .wk-ipadp-9 {
            width: 75%;
        }

        .wk-ipadp-10 {
            width: 83.333333%;
        }

        .wk-ipadp-11 {
            width: 91.666667%;
        }

        .wk-ipadp-12 {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .wk-tab-1 {
            width: 8.333333%;
        }

        .wk-tab-2 {
            width: 16.666667%;
        }

        .wk-tab-3 {
            width: 25%;
        }

        .wk-tab-4 {
            width: 33.333333%;
        }

        .wk-tab-5 {
            width: 41.666667%;
        }

        .wk-tab-6 {
            width: 50%;
        }

        .wk-tab-7 {
            width: 58.333333%;
        }

        .wk-tab-8 {
            width: 66.666667%;
        }

        .wk-tab-9 {
            width: 75%;
        }

        .wk-tab-10 {
            width: 83.333333%;
        }

        .wk-tab-11 {
            width: 91.666667%;
        }

        .wk-tab-12 {
            width: 100%;
        }
    }

    .extraptag {
        width: 87vw;
        font-size: 18px;
    }

    @media (max-width: 500px) {
        .wk-mobile-1 {
            width: 8.333333%;
        }

        .wk-mobile-2 {
            width: 16.666667%;
        }

        .wk-mobile-3 {
            width: 25%;
        }

        .wk-mobile-4 {
            width: 33.333333%;
        }

        .wk-mobile-5 {
            width: 41.666667%;
        }

        .wk-mobile-6 {
            width: 50%;
        }

        .wk-mobile-7 {
            width: 58.333333%;
        }

        .wk-mobile-8 {
            width: 66.666667%;
        }

        .wk-mobile-9 {
            width: 75%;
        }

        .wk-mobile-10 {
            width: 83.333333%;
        }

        .wk-mobile-11 {
            width: 91.666667%;
        }

        .wk-mobile-12 {
            width: 100%;
        }

        .extraptag {
            width: 92vw;
            font-size: 16px;
        }
    }
</style>
<div class="responsive-container-block bigContainer">
    <div class="responsive-container-block Container bottomContainer">
        <div class="ultimateImg">
            <img class="mainImg" src="{{ asset('assets/images/olive-max-hearing-aid-machine.webp')}}"
                alt="olive max hearing aid machine">
            <div class="purpleBox">
                <p class="purpleText">
                    "Bringing healthcare closer to you. Book medical tests from top companies effortlessly on our web
                    portal."
                </p>

            </div>
        </div>
        <div class="allText bottomText">
            <p class="text-blk headingText">
                About Us
                <br>
                <br>
            </p>
            <p class="text-blk subHeadingText">
                Enhancing auditory experiences, one click at a time. Discover top-notch ear aid technology with
                Ultrasonic Ltd.
            </p>
            <p class="text-blk description">
                At Ultrasonic Ltd., we believe that access to high-quality hearing solutions should be convenient,
                reliable, and personalized. Founded in 1990 by Mr. kidokoro, who recognized the growing need for
                innovation in the ear aid technology sector, our platform aims to revolutionize the way people shop for
                hearing products.
                <br><br>
                Driven by Mr. kidokoro deep understanding and insights gained from his experience in the industry,
                Ultrasonic Ltd. was established to address the challenges and inefficiencies in the traditional hearing
                aid market.
            </p>
            <p class="extraptag" style="color:whitesmoke;">
                After witnessing the complexities and limitations of conventional purchasing methods, Mr. kidokoro
                envisioned a digital platform that would simplify the process of finding and buying ear aid products
                while empowering users to make informed choices about their auditory health.
                <br><br>
                At Ultrasonic Ltd., we are committed to delivering a seamless and user-friendly shopping experience for
                individuals seeking cutting-edge hearing solutions. Our platform features a curated selection of
                reputable brands, offering a wide range of products to meet various hearing needs. Whether you're
                searching for advanced hearing aids, assistive listening devices, or accessories, Ultrasonic Ltd. has
                you covered.
            </p>
            <a class="explore" href="/#featuredProducts">
                View Products
            </a>
        </div>
    </div>
</div>

<style>
    .timelineheading {
        font-size: 22px;
    }


    .timeline {
        display: flex;
        flex-direction: column;
        margin: 20px auto;
        position: relative;
    }

    .timeline__event {
        margin-bottom: 20px;
        position: relative;
        display: flex;
        margin: 20px 0;
        border-radius: 6px;
        align-self: center;
        width: 80vw;
    }

    .timeline__event:nth-child(2n + 1) {
        flex-direction: row-reverse;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__date {
        border-radius: 0 6px 6px 0;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__content {
        border-radius: 6px 0 0 6px;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__icon:before {
        content: "";
        width: 2px;
        height: 100%;
        background: rgba(0, 0, 0, 0.372);
        position: absolute;
        top: 0%;
        left: 50%;
        right: auto;
        z-index: -1;
        transform: translateX(-50%);
        animation: fillTop 2s forwards 4s ease-in-out;
    }

    .timeline__event:nth-child(2n + 1) .timeline__event__icon:after {
        content: "";
        width: 100%;
        height: 2px;
        background: rgba(0, 0, 0, 0.372);
        position: absolute;
        right: 0;
        z-index: -1;
        top: 50%;
        left: auto;
        transform: translateY(-50%);
        animation: fillLeft 2s forwards 4s ease-in-out;
    }

    .timeline__event__title {
        font-size: 1.2rem;
        line-height: 1.4;
        text-transform: uppercase;
        font-weight: 600;
        color: white;
        letter-spacing: 1.5px;
    }

    .timeline__event__content {
        padding: 20px;
        box-shadow: 0 30px 60px -12px rgba(50, 50, 93, 0.25), 0 18px 36px -18px rgba(0, 0, 0, 0.3), 0 -12px 36px -8px rgba(0, 0, 0, 0.025);
        background: rgba(100, 92, 92, 0.278);
        width: calc(40vw - 84px);
        border-radius: 0 6px 6px 0;
    }

    .timeline__event__date {
        color: whitesmoke;
        font-size: 1.5rem;
        font-weight: 600;
        background: #2043784f;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        padding: 0 20px;
        border-radius: 6px 0 0 6px;
    }

    .timeline__event__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9251ac;
        padding: 20px;
        align-self: center;
        margin: 0 20px;
        background: #00000042;
        border-radius: 100%;
        width: 40px;
        box-shadow: 0 30px 60px -12px rgba(50, 50, 93, 0.25), 0 18px 36px -18px rgba(0, 0, 0, 0.3), 0 -12px 36px -8px rgba(0, 0, 0, 0.025);
        padding: 40px;
        height: 40px;
        position: relative;
    }

    .timeline__event__icon i {
        font-size: 32px;
    }

    .timeline__event__icon:before {
        content: "";
        width: 2px;
        height: 100%;
        background: #f6a4ec;
        position: absolute;
        top: 0%;
        z-index: -1;
        left: 50%;
        transform: translateX(-50%);
        animation: fillTop 2s forwards 4s ease-in-out;
    }

    .timeline__event__icon:after {
        content: "";
        width: 100%;
        height: 2px;
        background: #f6a4ec;
        position: absolute;
        left: 0%;
        z-index: -1;
        top: 50%;
        transform: translateY(-50%);
        animation: fillLeftOdd 2s forwards 4s ease-in-out;
    }

    .timeline__event__description {
        flex-basis: 100%;
    }

    .timeline__event--type2:after {
        background: #01030675;
    }

    .timeline__event--type2 .timeline__event__date {
        color: white;
        background: #01030675;
    }

    .timeline__event--type2:nth-child(2n + 1) .timeline__event__icon:before,
    .timeline__event--type2:nth-child(2n + 1) .timeline__event__icon:after {
        background: #01030675;
    }

    .timeline__event--type2 .timeline__event__icon {
        background: #00000042;
        color: #01030675;
    }

    .timeline__event--type2 .timeline__event__icon:before,
    .timeline__event--type2 .timeline__event__icon:after {
        background: #01030675;
    }

    .timeline__event--type2 .timeline__event__title {
        color: white;
    }

    .timeline__event--type3:after {
        background: #24b47e;
    }

    .timeline__event--type3 .timeline__event__date {
        color: #aff1b6;
        background-color: #24b47e;
    }

    .timeline__event--type3:nth-child(2n + 1) .timeline__event__icon:before,
    .timeline__event--type3:nth-child(2n + 1) .timeline__event__icon:after {
        background: #aff1b6;
    }

    .timeline__event--type3 .timeline__event__icon {
        background: #aff1b6;
        color: #24b47e;
    }

    .timeline__event--type3 .timeline__event__icon:before,
    .timeline__event--type3 .timeline__event__icon:after {
        background: #aff1b6;
    }

    .timeline__event--type3 .timeline__event__title {
        color: #24b47e;
    }

    .timeline__event:last-child .timeline__event__icon:before {
        content: none;
    }

    @media (max-width: 786px) {
        .timeline__event {
            flex-direction: column;
            align-self: center;
        }

        .timeline__event__content {
            width: 100%;
        }

        .timeline__event__icon {
            border-radius: 6px 6px 0 0;
            width: 100%;
            margin: 0;
            box-shadow: none;
        }

        .timeline__event__icon:before,
        .timeline__event__icon:after {
            display: none;
        }

        .timeline__event__date {
            border-radius: 0;
            padding: 20px;
        }

        .timeline__event:nth-child(2n + 1) {
            flex-direction: column;
            align-self: center;
        }

        .timeline__event:nth-child(2n + 1) .timeline__event__date {
            border-radius: 0;
            padding: 20px;
        }

        .timeline__event:nth-child(2n + 1) .timeline__event__icon {
            border-radius: 6px 6px 0 0;
            margin: 0;
        }

        .timelineheading {
            font-size: 14px;
            padding: 10px;
        }
    }

    @keyframes fillLeft {
        100% {
            right: 100%;
        }
    }

    @keyframes fillTop {
        100% {
            top: 100%;
        }
    }

    @keyframes fillLeftOdd {
        100% {
            left: 100%;
        }
    }
</style>

<div class="timeline">
    <h1 class="timelineheading" style="color: whitesmoke;
    line-height: 32px;
    font-weight: 700;text-align:center;">What sets us apart is our dedication to customer satisfaction and our
        unwavering commitment to transparency and reliability. With Intest Bazar, you can expect:</h1>
    <!--first-->
    <div class="timeline__event  animated fadeInUp delay-3s timeline__event--type2">
        <div class="timeline__event__icon ">
            <!-- <i class="lni-sport"></i>-->

        </div>
        <div class="timeline__event__date">
            Convenience
        </div>
        <div class="timeline__event__content ">
            <div class="timeline__event__title">
                Convenience at your fingertips
            </div>
            <div class="timeline__event__description">
                <p>Book appointments online at Intest Bazaar from the comfort of your home, eliminating the need for
                    tedious paperwork and phone calls</p>
            </div>
        </div>
    </div>

    <!--second-->

    <div class="timeline__event animated fadeInUp delay-2s timeline__event--type1">
        <div class="timeline__event__icon">
            <!-- <i class="lni-sport"></i>-->

        </div>
        <div class="timeline__event__date">
            Best Choice
        </div>
        <div class="timeline__event__content">
            <div class="timeline__event__title">
                Empowering your healthcare decisions
            </div>
            <div class="timeline__event__description">
                <p>Browse through a comprehensive list of medical tests offered by trusted companies, and select the
                    option that best fits your requirements.</p>
            </div>
        </div>
    </div>

    <!--third-->

    <div class="timeline__event animated fadeInUp delay-1s timeline__event--type2">
        <div class="timeline__event__icon">
            <!-- <i class="lni-sport"></i>-->

        </div>
        <div class="timeline__event__date">
            Best Quality
        </div>
        <div class="timeline__event__content">
            <div class="timeline__event__title">
                Assurance you can trust
            </div>
            <div class="timeline__event__description">
                <p>Rest assured knowing that all tests available on our platform are conducted by accredited
                    laboratories and healthcare providers, ensuring accuracy and reliability.</p>
            </div>

        </div>
    </div>

    <!--forth-->

    <div class="timeline__event animated fadeInUp timeline__event--type1">
        <div class="timeline__event__icon">
            <!-- <i class="lni-sport"></i>-->
        </div>
        <div class="timeline__event__date">
            Empowerment
        </div>
        <div class="timeline__event__content">
            <div class="timeline__event__title">
                Take control of your health journey
            </div>
            <div class="timeline__event__description">
                <p>Take control of your health journey by accessing comprehensive information about each test, including
                    pricing, turnaround times, and locations.</p>
            </div>
        </div>
    </div>
</div>
@endsection