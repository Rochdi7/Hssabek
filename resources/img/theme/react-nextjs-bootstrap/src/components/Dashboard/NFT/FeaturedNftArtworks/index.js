"use client";

import Image from "next/image";
import Link from "next/link";
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, Navigation } from "swiper/modules";

const nftData = [
  {
    id: 35246,
    title: "Christmas Eve",
    creatorDetails: "/creators/details/",
    imgSrc: "/images/nft-1.gif",
    creatorImg: "/images/user-76.gif",
    highestBid: "9.75 ETH",
    currentBid: "5.50 ETH",
    rating: 9.2,
    nftDetails: "/nft/details/",
  },
  {
    id: 35247,
    title: "Rotating Panda",
    creatorDetails: "/creators/details/",
    imgSrc: "/images/nft-2.png",
    creatorImg: "/images/user-77.gif",
    highestBid: "10.75 ETH",
    currentBid: "12.50 ETH",
    rating: 9.5,
    nftDetails: "/nft/details/",
  },
  {
    id: 35248,
    title: "Cookies Live",
    creatorDetails: "/creators/details/",
    imgSrc: "/images/nft-3.gif",
    creatorImg: "/images/user-76.gif",
    highestBid: "17.75 ETH",
    currentBid: "20.50 ETH",
    rating: 9.3,
    nftDetails: "/nft/details/",
  },
  {
    id: 35249,
    title: "World Savior",
    creatorDetails: "/creators/details/",
    imgSrc: "/images/nft-4.gif",
    creatorImg: "/images/user-78.gif",
    highestBid: "9.75 ETH",
    currentBid: "10.50 ETH",
    rating: 9.7,
    nftDetails: "/nft/details/",
  },
  {
    id: 352450,
    title: "Rotating Panda",
    creatorDetails: "/creators/details/",
    imgSrc: "/images/nft-2.png",
    creatorImg: "/images/user-77.gif",
    highestBid: "10.75 ETH",
    currentBid: "12.50 ETH",
    rating: 9.5,
    nftDetails: "/nft/details/",
  },
  {
    id: 35251,
    title: "Cookies Live",
    creatorDetails: "/creators/details/",
    imgSrc: "/images/nft-3.gif",
    creatorImg: "/images/user-76.gif",
    highestBid: "17.75 ETH",
    currentBid: "20.50 ETH",
    rating: 9.3,
    nftDetails: "/nft/details/",
  },
];

const FeaturedNftArtworks = () => {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
        <h3 className="mb-0">Featured NFT Artworks</h3>
      </div>

      <Swiper
        spaceBetween={25}
        navigation={true}
        breakpoints={{
          0: { slidesPerView: 1 },
          600: { slidesPerView: 2 },
          768: { slidesPerView: 2 },
          992: { slidesPerView: 2 },
          1500: { slidesPerView: 3 },
        }}
        autoplay={{
          delay: 5000,
          pauseOnMouseEnter: true,
          disableOnInteraction: false,
        }}
        modules={[Autoplay, Navigation]}
        className="nft-slide-two mb-4 z-0"
      >
        {nftData.map((nft) => (
          <SwiperSlide key={nft.id}>
            <div className="bg-white rounded-3 border-0 p-3 place-bid for-dark-card">
              <Link
                href={nft.nftDetails}
                className="d-block mb-3 text-decoration-none position-relative"
              >
                <Image
                  src={nft.imgSrc}
                  className="rounded-3"
                  alt="nft"
                  width={560}
                  height={414}
                />
                <span className="btn btn-primary py-2 px-3 d-inline-block fs-16 fw-medium position-absolute top-50 start-50 translate-middle opacity-0">
                  Place Bid
                </span>
              </Link>

              <div className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                <Link
                  href={nft.creatorDetails}
                  className="d-flex align-items-center text-decoration-none"
                >
                  <div className="flex-shrink-0">
                    <Image
                      src={nft.creatorImg}
                      className="rounded-circle"
                      width={27}
                      height={27}
                      alt="user"
                    />
                  </div>
                  <div className="flex-grow-1 ms-2">
                    <span className="fs-12">NFT ID: {nft.id}</span>
                    <h4 className="fw-semibold fs-14 mb-0">{nft.title}</h4>
                  </div>
                </Link>
                <Image
                  src="/images/verify.svg"
                  className="cursor"
                  alt="verify"
                  width={20}
                  height={20}
                />
              </div>

              <div className="d-flex justify-content-between align-items-center">
                <Link
                  href={nft.nftDetails}
                  className="d-flex align-items-center text-decoration-none"
                >
                  <div className="flex-grow-1">
                    <span className="fs-12 d-block mb-1">
                      Highest Bid:{" "}
                      <span className="fw-semibold text-secondary">
                        {nft.highestBid}
                      </span>
                    </span>
                    <h4 className="fw-semibold fs-14 mb-0">{nft.currentBid}</h4>
                  </div>
                </Link>
                <button className="bg-transparent p-0 border-0">
                  <i
                    className="ri-heart-fill fs-20 position-relative top-2"
                    style={{ color: "#EE3E08" }}
                  ></i>
                  <span className="text-secondary fs-12 fw-semibold">
                    {nft.rating}
                    <span className="text-body">/10</span>
                  </span>
                </button>
              </div>
            </div>
          </SwiperSlide>
        ))}
      </Swiper>
    </>
  );
};

export default FeaturedNftArtworks;
