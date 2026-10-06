
<?php
/*
|--------------------------------------------------------------------------
| Deewariya - 404 Page
|--------------------------------------------------------------------------
*/
?>

<style>

    /* =====================================================
       404 PAGE
    ===================================================== */

    .deewariya-404 {
        min-height: calc(100vh - 80px);

        display: flex;
        align-items: center;
        justify-content: center;

        position: relative;
        overflow: hidden;

        background: var(--secondary);

        padding: 80px 20px;

        color: #fff;
    }


    /* =====================================================
       BACKGROUND ART
    ===================================================== */

    .deewariya-404::before {
        content: "";

        position: absolute;

        width: 500px;
        height: 500px;

        border-radius: 50%;

        background: var(--primary);

        opacity: 0.035;

        top: -250px;
        right: -150px;
    }


    .deewariya-404::after {
        content: "";

        position: absolute;

        width: 350px;
        height: 350px;

        border: 1px solid var(--primary);

        border-radius: 50%;

        bottom: -220px;
        left: -100px;

        opacity: 0.15;
    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .error-content {
        position: relative;

        z-index: 5;

        width: 100%;
        max-width: 850px;

        text-align: center;
    }


    /* =====================================================
       LOGO
    ===================================================== */

    .error-logo {
        margin-bottom: 30px;
    }


    .error-logo img {
        width: 70px;
        height: 70px;

        object-fit: contain;

        filter:
            drop-shadow(
                0 0 12px
                rgba(185, 224, 1, 0.25)
            );

        animation: errorLogoFloat 3s ease-in-out infinite;
    }


    /* =====================================================
       404 NUMBER
    ===================================================== */

    .error-number {
        position: relative;

        margin: 0;

        font-family: "Oswald", sans-serif;

        font-size: clamp(130px, 22vw, 260px);

        line-height: 0.8;

        font-weight: 600;

        letter-spacing: -10px;

        color: transparent;

        -webkit-text-stroke: 2px var(--primary);

        opacity: 0.85;
    }


    .error-number span {
        color: var(--primary);

        -webkit-text-stroke: 0;

        opacity: 0.9;
    }


    /* =====================================================
       SMALL LABEL
    ===================================================== */

    .error-label {
        display: inline-block;

        margin-top: 30px;

        margin-bottom: 12px;

        color: var(--primary);

        font-size: 12px;

        font-weight: 600;

        letter-spacing: 4px;

        text-transform: uppercase;
    }


    /* =====================================================
       TITLE
    ===================================================== */

    .error-content h1 {
        margin: 0 0 15px;

        color: #fff;

        font-family: "Oswald", sans-serif;

        font-size: clamp(30px, 5vw, 52px);

        font-weight: 600;

        text-transform: uppercase;
    }


    /* =====================================================
       DESCRIPTION
    ===================================================== */

    .error-description {
        max-width: 600px;

        margin: 0 auto 30px;

        color: var(--light);

        font-size: 16px;

        line-height: 1.8;
    }


    /* =====================================================
       BUTTONS
    ===================================================== */

    .error-actions {
        display: flex;

        align-items: center;

        justify-content: center;

        flex-wrap: wrap;

        gap: 12px;
    }


    .error-home-btn,
    .error-back-btn {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 9px;

        min-width: 155px;

        padding: 13px 24px;

        font-size: 13px;

        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: 1px;

        text-decoration: none;

        transition: all 0.3s ease;
    }


    /* Primary Button */

    .error-home-btn {
        background: var(--primary);

        color: var(--dark);

        border: 1px solid var(--primary);
    }


    .error-home-btn:hover {
        background: transparent;

        color: var(--primary);
    }


    /* Secondary Button */

    .error-back-btn {
        background: transparent;

        color: #fff;

        border: 1px solid var(--light);
    }


    .error-back-btn:hover {
        border-color: var(--primary);

        color: var(--primary);
    }


    /* =====================================================
       ARTISTIC LINE
    ===================================================== */

    .error-art-line {
        width: 90px;

        height: 3px;

        background: var(--primary);

        margin: 35px auto 0;

        position: relative;
    }


    .error-art-line::before,
    .error-art-line::after {
        content: "";

        position: absolute;

        top: 50%;

        transform: translateY(-50%);

        width: 6px;

        height: 6px;

        border-radius: 50%;

        background: var(--primary);
    }


    .error-art-line::before {
        left: -15px;
    }


    .error-art-line::after {
        right: -15px;
    }


    /* =====================================================
       ANIMATION
    ===================================================== */

    @keyframes errorLogoFloat {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }

    }


    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 576px) {

        .deewariya-404 {
            min-height: calc(100vh - 70px);

            padding: 60px 15px;
        }


        .error-logo img {
            width: 58px;
            height: 58px;
        }


        .error-number {
            font-size: 130px;

            letter-spacing: -5px;
        }


        .error-content h1 {
            font-size: 30px;
        }


        .error-description {
            font-size: 14px;

            padding: 0 10px;
        }


        .error-actions {
            flex-direction: column;

            width: 100%;
        }


        .error-home-btn,
        .error-back-btn {
            width: 100%;

            max-width: 250px;
        }

    }

</style>


<!-- =====================================================
     404 PAGE START
====================================================== -->

<section class="deewariya-404">

    <div class="error-content">


        <!-- LOGO / FAVICON -->

        <div class="error-logo">

            <img
                src="image/favicon.png"
                alt="Deewariya Art Studio"
            >

        </div>


        <!-- 404 -->

        <div class="error-number">

            4<span>0</span>4

        </div>


        <!-- LABEL -->

        <span class="error-label">
            Lost on the Canvas
        </span>


        <!-- TITLE -->

        <h1>
            Page Not Found
        </h1>


        <!-- DESCRIPTION -->

        <p class="error-description">

            Looks like this artwork hasn't been created yet.
            The page you're looking for may have been moved,
            removed or doesn't exist anymore.

        </p>


        <!-- BUTTONS -->

        <div class="error-actions">


            <!-- HOME -->

            <a
                href="./"
                class="error-home-btn"
            >

                <i class="fa fa-home"></i>

                Back to Home

            </a>


            <!-- BACK -->

            <a
                href="javascript:history.back()"
                class="error-back-btn"
            >

                <i class="fa fa-arrow-left"></i>

                Go Back

            </a>


        </div>


        <!-- ARTISTIC LINE -->

        <div class="error-art-line"></div>


    </div>

</section>

<!-- =====================================================
     404 PAGE END
====================================================== -->

