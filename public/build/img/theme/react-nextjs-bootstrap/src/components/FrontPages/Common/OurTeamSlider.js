"use client";

import Image from "next/image";
import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Autoplay } from "swiper/modules";

const OurTeamSlider = () => {
  return (
    <>
      <div className="our-team-area position-relative z-1">
        <div className="container">
          <div className="mb-4 mb-lg-5">
            <div className="section-title ms-0 text-start mw-630 mb-0">
              <span className="top-title">
                <span>Our Team</span>
              </span>
              <h2>
                Introducing Our Exceptional Team. Meet the Minds Driving Our
                Success
              </h2>
            </div>
          </div>

          <Swiper
            spaceBetween={25}
            pagination={{
              clickable: true,
            }}
            autoplay={{
              delay: 5000,
              pauseOnMouseEnter: true,
              disableOnInteraction: false,
            }}
            breakpoints={{
              0: {
                slidesPerView: 1,
              },
              768: {
                slidesPerView: 2,
              },
              922: {
                slidesPerView: 2,
              },
              1200: {
                slidesPerView: 3,
              },
            }}
            modules={[Pagination, Autoplay]}
            className="team-slide"
          >
            <SwiperSlide>
              <div className="our-team-single-item">
                <div className="team-img">
                  <Image
                    src="/images/landing/team-1.jpg"
                    alt="team"
                    width={600}
                    height={600}
                  />
                </div>
                <div className="team-content d-flex justify-content-between align-items-center">
                  <div>
                    <h3>Michael Johnson</h3>
                    <span>CEO</span>
                  </div>
                  <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-3">
                    <li>
                      <a
                        href="https://www.facebook.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-facebook-fill"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.twitter.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-twitter-x-line"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.linkedin.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-linkedin-fill"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </SwiperSlide>

            <SwiperSlide>
              <div className="our-team-single-item">
                <div className="team-img">
                  <Image
                    src="/images/landing/team-2.jpg"
                    alt="team"
                    width={600}
                    height={600}
                  />
                </div>
                <div className="team-content d-flex justify-content-between align-items-center">
                  <div>
                    <h3>Emily Davis</h3>
                    <span>Project Manager</span>
                  </div>
                  <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-3">
                    <li>
                      <a
                        href="https://www.facebook.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-facebook-fill"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.twitter.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-twitter-x-line"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.linkedin.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-linkedin-fill"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </SwiperSlide>

            <SwiperSlide>
              <div className="our-team-single-item">
                <div className="team-img">
                  <Image
                    src="/images/landing/team-3.jpg"
                    alt="team"
                    width={600}
                    height={600}
                  />
                </div>
                <div className="team-content d-flex justify-content-between align-items-center">
                  <div>
                    <h3>Daniel Lee</h3>
                    <span>Sales Team Lead</span>
                  </div>
                  <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-3">
                    <li>
                      <a
                        href="https://www.facebook.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-facebook-fill"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.twitter.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-twitter-x-line"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.linkedin.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-linkedin-fill"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </SwiperSlide>

            <SwiperSlide>
              <div className="our-team-single-item">
                <div className="team-img">
                  <Image
                    src="/images/landing/team-1.jpg"
                    alt="team"
                    width={600}
                    height={600}
                  />
                </div>
                <div className="team-content d-flex justify-content-between align-items-center">
                  <div>
                    <h3>Michael Johnson</h3>
                    <span>CEO</span>
                  </div>
                  <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-3">
                    <li>
                      <a
                        href="https://www.facebook.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-facebook-fill"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.twitter.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-twitter-x-line"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.linkedin.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-linkedin-fill"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </SwiperSlide>

            <SwiperSlide>
              <div className="our-team-single-item">
                <div className="team-img">
                  <Image
                    src="/images/landing/team-2.jpg"
                    alt="team"
                    width={600}
                    height={600}
                  />
                </div>
                <div className="team-content d-flex justify-content-between align-items-center">
                  <div>
                    <h3>Emily Davis</h3>
                    <span>Project Manager</span>
                  </div>
                  <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-3">
                    <li>
                      <a
                        href="https://www.facebook.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-facebook-fill"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.twitter.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-twitter-x-line"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.linkedin.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-linkedin-fill"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </SwiperSlide>

            <SwiperSlide>
              <div className="our-team-single-item">
                <div className="team-img">
                  <Image
                    src="/images/landing/team-3.jpg"
                    alt="team"
                    width={600}
                    height={600}
                  />
                </div>
                <div className="team-content d-flex justify-content-between align-items-center">
                  <div>
                    <h3>Daniel Lee</h3>
                    <span>Sales Team Lead</span>
                  </div>
                  <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-3">
                    <li>
                      <a
                        href="https://www.facebook.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-facebook-fill"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.twitter.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-twitter-x-line"></i>
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.linkedin.com/"
                        target="_blank"
                        className="text-decoration-none fs-20 text-primary"
                      >
                        <i className="ri-linkedin-fill"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </SwiperSlide>
          </Swiper>
        </div>

        {/* Shape Images */}
        <Image
          src="/images/landing/shape-1.png"
          className="shape shape-3"
          alt="shape"
          width={1130}
          height={1130}
        />
        <Image
          src="/images/landing/shape-2.png"
          className="shape shape-4"
          alt="shape"
          width={947}
          height={953}
        />
      </div>
    </>
  );
};

export default OurTeamSlider;
