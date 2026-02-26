"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";
import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Autoplay } from "swiper/modules";

const RecentProperty = () => {
  return (
    <>
      <Card className="bg-primary-div bg-opacity-10 border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Recent Property</h3>
          </div>

          <Swiper
            spaceBetween={24}
            pagination={{
              clickable: true,
            }}
            autoHeight={true}
            breakpoints={{
              0: {
                slidesPerView: 1,
              },
              768: {
                slidesPerView: 2,
              },
              1199: {
                slidesPerView: 2,
              },
              1400: {
                slidesPerView: 1,
              },
              1600: {
                slidesPerView: 1,
              },
              1700: {
                slidesPerView: 2,
              },
            }}
            autoplay={{
              delay: 5000,
              pauseOnMouseEnter: true,
              disableOnInteraction: false,
            }}
            modules={[Pagination, Autoplay]}
            className="recent-property-slide z-0"
          >
            <SwiperSlide className="bg-white p-2 rounded-3">
              <Image
                src="/images/property-5.png"
                className="rounded-3"
                alt="property"
                width={930}
                height={450}
              />

              <div className="mt-3">
                <h3 className="mb-2">$800,000</h3>
                <div className="d-flex flex-wrap gap-2 justify-content-between mb-2">
                  <span>35 Prince Consort Road</span>
                  <Link
                    href="#"
                    className="fs-14 text-primary fw-medium text-decoration-none"
                  >
                    View More
                  </Link>
                </div>

                <div className="d-flex flex-wrap gap-3">
                  <div className="d-flex align-items-center">
                    <i className="ri-hotel-bed-line fs-18 text-primary"></i>
                    <span className="ms-2">6 Bed</span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-showers-line fs-18 text-primary"></i>
                    <span className="ms-2">5 Bath</span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-square-line fs-18 text-primary"></i>
                    <span className="ms-2">5 Bath</span>
                  </div>
                </div>
              </div>
            </SwiperSlide>

            <SwiperSlide className="bg-white p-2 rounded-3">
              <Image
                src="/images/property-6.png"
                className="rounded-3"
                alt="property"
                width={930}
                height={450}
              />

              <div className="mt-3">
                <h3 className="mb-2">$220,000</h3>
                <div className="d-flex flex-wrap gap-2 justify-content-between mb-2">
                  <span>58 Gateway Road Portland</span>
                  <Link
                    href="#"
                    className="fs-14 text-primary fw-medium text-decoration-none"
                  >
                    View More
                  </Link>
                </div>

                <div className="d-flex flex-wrap gap-3">
                  <div className="d-flex align-items-center">
                    <i className="ri-hotel-bed-line fs-18 text-primary"></i>
                    <span className="ms-2">8 Bed</span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-showers-line fs-18 text-primary"></i>
                    <span className="ms-2">6 Bath</span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-square-line fs-18 text-primary"></i>
                    <span className="ms-2">2000 sqft</span>
                  </div>
                </div>
              </div>
            </SwiperSlide>

            <SwiperSlide className="bg-white p-2 rounded-3">
              <Image
                src="/images/property-5.png"
                className="rounded-3"
                alt="property"
                width={930}
                height={450}
              />

              <div className="mt-3">
                <h3 className="mb-2">$800,000</h3>
                <div className="d-flex flex-wrap gap-2 justify-content-between mb-2">
                  <span>35 Prince Consort Road</span>
                  <Link
                    href="#"
                    className="fs-14 text-primary fw-medium text-decoration-none"
                  >
                    View More
                  </Link>
                </div>

                <div className="d-flex flex-wrap gap-3">
                  <div className="d-flex align-items-center">
                    <i className="ri-hotel-bed-line fs-18 text-primary"></i>
                    <span className="ms-2">6 Bed</span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-showers-line fs-18 text-primary"></i>
                    <span className="ms-2">5 Bath</span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-square-line fs-18 text-primary"></i>
                    <span className="ms-2">5 Bath</span>
                  </div>
                </div>
              </div>
            </SwiperSlide>

            <SwiperSlide className="bg-white p-2 rounded-3">
              <Image
                src="/images/property-6.png"
                className="rounded-3"
                alt="property"
                width={930}
                height={450}
              />

              <div className="mt-3">
                <h3 className="mb-2">$220,000</h3>
                <div className="d-flex flex-wrap gap-2 justify-content-between mb-2">
                  <span>58 Gateway Road Portland</span>
                  <Link
                    href="#"
                    className="fs-14 text-primary fw-medium text-decoration-none"
                  >
                    View More
                  </Link>
                </div>

                <div className="d-flex flex-wrap gap-3">
                  <div className="d-flex align-items-center">
                    <i className="ri-hotel-bed-line fs-18 text-primary"></i>
                    <span className="ms-2">8 Bed</span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-showers-line fs-18 text-primary"></i>
                    <span className="ms-2">6 Bath</span>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-square-line fs-18 text-primary"></i>
                    <span className="ms-2">2000 sqft</span>
                  </div>
                </div>
              </div>
            </SwiperSlide>
          </Swiper>
        </Card.Body>
      </Card>
    </>
  );
};

export default RecentProperty;
