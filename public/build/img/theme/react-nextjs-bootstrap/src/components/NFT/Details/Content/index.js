"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";
import ProductDescription from "./ProductDescription";
import CountdownTimer from "./CountdownTimer";

const Content = () => {
  return (
    <>
      <Card className="border-0 rounded-2 p-4 bg-white mb-4">
        <div className="border-bottom mb-3 pb-3">
          <span className="fs-12 d-block mb-1">NFT ID: 35246</span>
          <h3 className="fs-24 mb-0">Christmas Eve</h3>
        </div>

        <div className="d-flex flex-wrap gap-2 gap-sm-5 mb-4">
          <div className="d-flex align-items-center">
            <div className="flex-shrink-0 position-relative">
              <Image
                src="/images/user-76.gif"
                className="rounded-circle"
                alt="user"
                width={30}
                height={30}
              />
              <Image
                src="/images/verify.svg"
                className="position-absolute top-100 start-100 translate-middle"
                alt="verify"
                width={18}
                height={18}
              />
            </div>
            <div className="flex-grow-1 ms-3">
              <span className="fs-12">Creator</span>
              <h4 className="fs-14 fw-semibold">Anan Loren</h4>
            </div>
          </div>

          <div className="d-flex align-items-center">
            <div className="flex-shrink-0 position-relative">
              <Image
                src="/images/schedule2.png"
                alt="schedule2"
                width={30}
                height={30}
              />
            </div>
            <div className="flex-grow-1 ms-3">
              <span className="fs-12">Published</span>
              <h4 className="fs-14 fw-semibold">23 June 2024</h4>
            </div>
          </div>
        </div>

        <div className="d-flex flex-wrap justify-content-between gap-3 rounded-3 bg-body-bg p-3 mb-5">
          <div className="text-center">
            <span className="fs-12 d-block mb-1 text-body">Price:</span>
            <h3 className="mb-0 fw-semibold fs-14">5.50 ETH</h3>
          </div>

          <div className="text-center">
            <span className="fs-12 d-block mb-1 text-body">Highest Bid:</span>
            <h3 className="mb-0 fw-semibold fs-14">4.95 ETH</h3>
          </div>

          <div className="text-center">
            <span className="fs-12 d-block mb-1 text-body">Stock:</span>
            <h3 className="mb-0 fw-semibold fs-14">130/450</h3>
          </div>

          <div className="text-center">
            <span className="fs-12 d-block mb-1 text-body">Price:</span>
            <h3 className="mb-0 fw-semibold fs-14">5.50 ETH</h3>
          </div>

          <CountdownTimer />
        </div>

        <h3 className="fs-18 mb-3">Description</h3>
        <p className="mb-5">
          This NFT captures the essence of boundless potential, symbolized by a
          surreal landscape where the sky meets the earth in a dazzling fusion
          of colors. The intricate design features flowing lines that blend
          together, representing the limitless paths we can take in life.
        </p>

        {/* ProductDescription */}
        <ProductDescription />
      </Card>
    </>
  );
};

export default Content;
