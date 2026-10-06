<div class="container my-5">
    <div class="welcome-card shadow-sm">
        
        <div class="welcome-content">
            <span class="welcome-label">WELCOME TO</span>

            <h1><?= $web_data['website_title'] ?></h1>

            <p>
                Discover beautiful artwork, creative ideas, and unique
                artistic expressions crafted with passion.
            </p>

            <div class="welcome-buttons">
                <a href="?page=gallery" class="btn btn-dark">
                    Explore Gallery
                </a>

                <a href="?page=projects" class="btn btn-outline-dark">
                    Learn More
                </a>
            </div>
        </div>

        <div class="welcome-decoration">
            <div class="paint-circle circle-1"></div>
            <div class="paint-circle circle-2"></div>
            <div class="paint-circle circle-3"></div>

            <span class="brush-icon">🖌️</span>
        </div>

    </div>
</div>

<style>.welcome-card {
    position: relative;
    overflow: hidden;
    min-height: 380px;
    padding: 70px;
    border-radius: 24px;
    background: #f7f3ed;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.welcome-content {
    max-width: 650px;
    position: relative;
    z-index: 2;
}

.welcome-label {
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 4px;
    color: #777;
}

.welcome-content h1 {
    margin: 15px 0;
    font-size: 52px;
    font-weight: 700;
    line-height: 1.1;
    color: #222;
}

.welcome-content p {
    max-width: 550px;
    font-size: 17px;
    line-height: 1.8;
    color: #666;
    margin-bottom: 30px;
}

.welcome-buttons {
    display: flex;
    gap: 12px;
}

.welcome-buttons .btn {
    padding: 12px 24px;
    border-radius: 30px;
}

.welcome-decoration {
    position: absolute;
    right: 50px;
    width: 300px;
    height: 300px;
}

.paint-circle {
    position: absolute;
    border-radius: 50%;
    opacity: 0.85;
}

.circle-1 {
    width: 210px;
    height: 210px;
    background: #d9a441;
    right: 20px;
    top: 20px;
}

.circle-2 {
    width: 140px;
    height: 140px;
    background: #c96f52;
    right: 130px;
    bottom: 20px;
}

.circle-3 {
    width: 90px;
    height: 90px;
    background: #496b63;
    right: 10px;
    bottom: 10px;
}

.brush-icon {
    position: absolute;
    font-size: 80px;
    right: 80px;
    top: 90px;
    transform: rotate(-25deg);
}

@media (max-width: 768px) {

    .welcome-card {
        padding: 40px 25px;
        min-height: auto;
    }

    .welcome-content h1 {
        font-size: 38px;
    }

    .welcome-content p {
        font-size: 15px;
    }

    .welcome-decoration {
        opacity: 0.15;
        right: -80px;
    }

    .welcome-buttons {
        flex-wrap: wrap;
    }
}</style>