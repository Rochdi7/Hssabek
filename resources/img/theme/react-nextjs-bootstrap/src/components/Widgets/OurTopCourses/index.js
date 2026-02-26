"use client";

import { Card } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, Pagination } from "swiper/modules";

const OurTopCourses = () => {
  return (
    <>
      <Swiper
        spaceBetween={0}
        pagination={{
          clickable: true,
        }}
        autoHeight={true}
        autoplay={{
          delay: 5000,
          pauseOnMouseEnter: true,
          disableOnInteraction: false,
        }}
        modules={[Autoplay, Pagination]}
        className="courses-slide mb-4"
      >
        <SwiperSlide>
          <Card className="bg-card-bg-c bg-primary border-0 rounded-3 overflow-hidden position-relative">
            <Card.Body className="p-4">
              <h3 className="mb-0 text-white fw-semibold">
                Our Top Courses
              </h3>

              <div className="d-flex align-items-center py-3">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/courses-1.jpg"
                    className="wh-130-113 rounded-3"
                    alt="courses"
                    width={520}
                    height={520}
                  />
                </div>
                <div className="flex-grow-1 ms-3">
                  <span className="d-block mb-2 text-white">
                    Python Programming
                  </span>
                  <h3 className="mb-0 fs-20 text-white">$35.99</h3>
                </div>
              </div>

              <h3 className="mb-2 fs-20 text-white">Course content</h3>

              <ul className="ps-0 mb-3 list-unstyled d-flex flex-wrap gap-2 gap-sm-0 list-dot">
                <li className="text-white">10 sections</li>
                <li className="text-white">45 lectures</li>
                <li className="text-white">25h 50m</li>
              </ul>

              <div className="text-end">
                <Link
                  href="#"
                  className="btn border-color-white text-white py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line"></i>
                    <span>View Details</span>
                  </span>
                </Link>
              </div>
            </Card.Body>

            <Image
              src="/images/shape.png"
              className="position-absolute top-0 end-0"
              alt="shape"
              width={98}
              height={89}
            />
          </Card>
        </SwiperSlide>

        <SwiperSlide>
          <Card className="bg-card-bg-c bg-primary border-0 rounded-3 overflow-hidden position-relative">
            <Card.Body className="p-4">
              <h3 className="mb-0 text-white fw-semibold">
                Our Top Courses
              </h3>

              <div className="d-flex align-items-center py-3">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/event-5.jpg"
                    className="wh-130-113 rounded-3"
                    alt="courses"
                    width={520}
                    height={520}
                  />
                </div>
                <div className="flex-grow-1 ms-3">
                  <span className="d-block mb-2 text-white">Basic Python</span>
                  <h3 className="mb-0 fs-20 text-white">$49.99</h3>
                </div>
              </div>

              <h3 className="mb-2 fs-20 text-white">Course content</h3>

              <ul className="ps-0 mb-3 list-unstyled d-flex flex-wrap gap-2 gap-sm-0 list-dot">
                <li className="text-white">12 sections</li>
                <li className="text-white">46 lectures</li>
                <li className="text-white">30h 50m</li>
              </ul>

              <div className="text-end">
                <Link
                  href="#"
                  className="btn border-color-white text-white py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line"></i>
                    <span>View Details</span>
                  </span>
                </Link>
              </div>
            </Card.Body>

            <Image
              src="/images/shape.png"
              className="position-absolute top-0 end-0"
              alt="shape"
              width={98}
              height={89}
            />
          </Card>
        </SwiperSlide>
      </Swiper>
    </>
  );
};

export default OurTopCourses;
