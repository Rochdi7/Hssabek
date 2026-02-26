"use client";

import React, { useState } from "react";
import { Row, Col, Button } from "react-bootstrap";
import Image from "next/image";
import Content from "./Content";

const Details = () => {
  // activeTab
  const [activeTab, setActiveTab] = useState(0);

  // Image data array to make it more dynamic
  const images = [
    { id: 0, src: "/images/nft-details-1.png", alt: "nft-details-1" },
    { id: 1, src: "/images/nft-details-2.png", alt: "nft-details-2" },
    { id: 2, src: "/images/nft-details-3.png", alt: "nft-details-3" },
    { id: 3, src: "/images/nft-details-4.png", alt: "nft-details-4" },
  ];

  return (
    <>
      <Row>
        <Col xs={12} sm={12} lg={4} xl={4} xxl={4}>
          <div className="mb-4">
            <div className="tab-content mb-3 card border-0 bg-white p-3 rounded-2">
              <Image
                src={images[activeTab].src}
                className="rounded-2"
                alt={images[activeTab].alt}
                width={1284}
                height={1320}
              />
            </div>

            <ul className="nav nav-tabs gap-3 nft-detail-tabs border-0 justify-content-center">
              {images.map((image, index) => (
                <li key={image.id} className="nav-item">
                  <button
                    onClick={() => setActiveTab(index)}
                    className={`nav-link p-0 border-0 ${
                      activeTab === index ? "active" : ""
                    }`}
                  >
                    <Image
                      src={image.src}
                      className="rounded-2"
                      alt={image.alt}
                      width={110}
                      height={110}
                    />
                  </button>
                </li>
              ))}
            </ul>
          </div>

          <Button className="btn btn-primary py-2 px-4 w-100 mb-4">
            Place Bid
          </Button>
        </Col>

        <Col xs={12} sm={12} lg={8} xl={8} xxl={8}>
          <Content />
        </Col>
      </Row>
    </>
  );
};

export default Details;
