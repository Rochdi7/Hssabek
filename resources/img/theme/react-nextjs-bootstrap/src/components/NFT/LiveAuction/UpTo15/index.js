"use client";

import React, { useState } from "react";
import { Row, Col, Button, ProgressBar } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";

const nftData = [
  {
    id: 35249,
    title: "Pixel Watermmelon",
    userImage: "/images/user-76.gif",
    nftImage: "/images/nft-14.png",
    highestBid: "1.75 ETH",
    currentBid: "3.50 ETH",
    rating: 9.5,
    sold: 100,
    available: 100,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
  {
    id: 35250,
    title: "BDancing Cookies",
    userImage: "/images/user-77.gif",
    nftImage: "/images/nft-3.gif",
    highestBid: "10.75 ETH",
    currentBid: "12.50 ETH",
    rating: 9.7,
    sold: 50,
    available: 150,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
  {
    id: 35251,
    title: "Rotating Flower",
    userImage: "/images/user-85.png",
    nftImage: "/images/nft-15.png",
    highestBid: "3.95 ETH",
    currentBid: "6.50 ETH",
    rating: 9.1,
    sold: 55,
    available: 150,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
  {
    id: 35252,
    title: "Humming Bird",
    userImage: "/images/user-77.gif",
    nftImage: "/images/nft-11.png",
    highestBid: "10.75 ETH",
    currentBid: "12.50 ETH",
    rating: 9.5,
    sold: 100,
    available: 123,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
  {
    id: 35253,
    title: "Christmas Eve",
    userImage: "/images/user-76.gif",
    nftImage: "/images/nft-10.png",
    highestBid: "9.75 ETH",
    currentBid: "5.50 ETH",
    rating: 9.2,
    sold: 130,
    available: 123,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
  {
    id: 35254,
    title: "Naughty Pool",
    userImage: "/images/user-85.png",
    nftImage: "/images/nft-12.png",
    highestBid: "8.75 ETH",
    currentBid: "9.50 ETH",
    rating: 9.7,
    sold: 90,
    available: 123,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
  {
    id: 35246,
    title: "Christmas Eve",
    userImage: "/images/user-76.gif",
    nftImage: "/images/nft-10.png",
    highestBid: "9.75 ETH",
    currentBid: "5.50 ETH",
    rating: 9.2,
    sold: 130,
    available: 123,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
  {
    id: 35247,
    title: "Humming Bird",
    userImage: "/images/user-77.gif",
    nftImage: "/images/nft-11.png",
    highestBid: "10.75 ETH",
    currentBid: "12.50 ETH",
    rating: 9.5,
    sold: 100,
    available: 123,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
  {
    id: 35248,
    title: "Naughty Pool",
    userImage: "/images/user-85.png",
    nftImage: "/images/nft-12.png",
    highestBid: "8.75 ETH",
    currentBid: "9.50 ETH",
    rating: 9.7,
    sold: 90,
    available: 123,
    nftDetails: "/nft/details/",
    creatorDetails: "/creators/details/",
  },
];

const ITEMS_PER_PAGE = 6;

const UpTo15 = () => {
  const [currentPage, setCurrentPage] = useState(1);

  const totalPages = Math.ceil(nftData.length / ITEMS_PER_PAGE);

  const handlePrevPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  const handleNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  // Calculate the items to display for the current page
  const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
  const currentItems = nftData.slice(startIndex, startIndex + ITEMS_PER_PAGE);

  return (
    <>
      <Row className="justify-content-center">
        {currentItems.map((nft) => (
          <Col sm={6} xxl={4} key={nft.id}>
            <div className="bg-white rounded-3 border-0 p-3 place-bid for-dark-card mb-4">
              <Link
                href={nft.nftDetails}
                className="d-block mb-3 text-decoration-none position-relative"
              >
                <Image
                  src={nft.nftImage}
                  className="rounded-3"
                  alt="nft"
                  width={726}
                  height={516}
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
                      src={nft.userImage}
                      className="rounded-circle"
                      alt="user"
                      width={27}
                      height={27}
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

              <div className="d-flex justify-content-between align-items-center mb-4 pb-2">
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
                <Button className="bg-transparent p-0 border-0">
                  <i
                    className="ri-heart-fill fs-20 position-relative top-2"
                    style={{ color: "#EE3E08" }}
                  ></i>{" "}
                  <span className="text-secondary fs-12 fw-semibold">
                    {nft.rating}
                    <span className="text-body">/10</span>
                  </span>
                </Button>
              </div>

              <ProgressBar
                variant="primary"
                now={(nft.sold / (nft.sold + nft.available)) * 100}
                className="rounded-0 mb-2"
                style={{ height: "4px" }}
              />

              <div className="d-flex justify-content-between align-items-center">
                <span className="fs-12">Sold: {nft.sold}</span>
                <span className="fs-12">Available: {nft.available}</span>
              </div>
            </div>
          </Col>
        ))}

        <div className="col-lg-12">
          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mb-4">
            <span className="fs-12 fw-medium">
              Showing {startIndex + 1}-
              {Math.min(startIndex + ITEMS_PER_PAGE, nftData.length)} of{" "}
              {nftData.length} Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={handlePrevPage}
                    disabled={currentPage === 1}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_left
                    </i>
                  </Button>
                </li>
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={handleNextPage}
                    disabled={currentPage === totalPages}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_right
                    </i>
                  </Button>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </Row>
    </>
  );
};

export default UpTo15;
