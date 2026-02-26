"use client";

import Image from "next/image";
import Link from "next/link";
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, Pagination } from "swiper/modules";
import { Card } from "react-bootstrap";
import { useState } from "react";

const TopCollections = () => {
  const [collections, setCollections] = useState([
    {
      id: 1,
      title: "Christmas Eve",
      itemsCount: 3250,
      imageUrl: "/images/collections.png",
      userImage: "/images/user-76.gif",
      verifiedBadge: "/images/verify-2.svg",
    },
    {
      id: 2,
      title: "Walking Brain",
      itemsCount: 2230,
      imageUrl: "/images/collections-2.png",
      userImage: "/images/user-76.gif",
      verifiedBadge: "/images/verify-2.svg",
    },
    {
      id: 3,
      title: "Flying Flower",
      itemsCount: 8536,
      imageUrl: "/images/collections-3.png",
      userImage: "/images/user-76.gif",
      verifiedBadge: "/images/verify-2.svg",
    },
  ]);

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="mb-4 d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h3 className="mb-0">Top Collections</h3>
          <Link href="#" className="text-decoration-none text-primary fs-12">
            View More
          </Link>
        </div>

        <Swiper
          slidesPerView={1}
          pagination={{
            clickable: true,
          }}
          autoplay={{
            delay: 5000,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
          }}
          modules={[Autoplay, Pagination]}
          className="top-collections-slide z-0"
        >
          {collections.map((collection) => (
            <SwiperSlide key={collection.id}>
              <div className="position-relative">
                <Link href="#" className="d-block position-relative">
                  <Image
                    src={collection.imageUrl}
                    className="rounded-3"
                    alt="collection"
                    width={484}
                    height={594}
                  />
                </Link>
                <div className="position-absolute bottom-0 start-50 translate-middle-x w-100 p-2">
                  <div
                    className="rounded-3 p-3 d-flex justify-content-between align-items-center"
                    style={{
                      background: "rgba(35, 39, 46, 0.70)",
                      backdropFilter: "blur(6px)",
                    }}
                  >
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0 position-relative">
                        <Image
                          src={collection.userImage}
                          className="rounded-circle"
                          alt="user"
                          width={27}
                          height={27}
                        />
                        <Image
                          src={collection.verifiedBadge}
                          className="position-absolute top-100 start-100 translate-middle"
                          alt="verified"
                          width={15}
                          height={15}
                        />
                      </div>
                      <div className="flex-grow-1 ms-4 position-relative top-2">
                        <h4 className="fs-14 fw-semibold mb-0 text-white">
                          {collection.title}
                        </h4>
                        <span className="fs-12" style={{ color: "#B1BBC8" }}>
                          {collection.itemsCount} Items
                        </span>
                      </div>
                    </div>
                    <Link
                      href="#"
                      className="d-inline-block text-secondary text-center rounded-circle text-decoration-none fs-16 hover-bg"
                      style={{
                        width: "30px",
                        height: "30px",
                        lineHeight: "30px",
                        backgroundColor: "#8695AA",
                      }}
                    >
                      <i className="ri-arrow-right-line text-black"></i>
                    </Link>
                  </div>
                </div>
              </div>
            </SwiperSlide>
          ))}
        </Swiper>
      </Card.Body>
    </Card>
  );
};

export default TopCollections;
