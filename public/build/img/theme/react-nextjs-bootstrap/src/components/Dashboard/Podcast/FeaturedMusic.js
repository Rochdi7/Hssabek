"use client";

import React, { useRef, useState } from "react";
import { Row, Col } from "react-bootstrap";
import Image from "next/image";
import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination } from "swiper/modules";

const audioData = [
  {
    id: 1,
    title: "Mastering Digital Marketing",
    description:
      "Learn the latest digital marketing strategies with insights from SEO expert James Lee.",
    host: "Sarah J.",
    guest: "James Lee, SEO Expert",
    listens: "8,200",
    likes: "1,500",
    shares: "350",
    image: "/images/shape-15.png",
    audioSrc: "https://cldup.com/qR72ozoaiQ.mp3",
  },
  {
    id: 2,
    title: "Content Marketing Essentials",
    description:
      "This episode covers creating impactful content that resonates with audiences.",
    host: "Tom R.",
    guest: "Lisa Kim",
    listens: "7,500",
    likes: "1,200",
    shares: "280",
    image: "/images/shape-16.png",
    audioSrc: "https://cldup.com/qR72ozoaiQ.mp3",
  },
  {
    id: 3,
    title: "Social Media Trends",
    description:
      "Latest trends in social media marketing for maximum engagement.",
    host: "Amanda G.",
    guest: "David Chen",
    listens: "9,000",
    likes: "1,700",
    shares: "400",
    image: "/images/shape-17.png",
    audioSrc: "https://cldup.com/qR72ozoaiQ.mp3",
  },
];

const FeaturedMusic = () => {
  const [playingId, setPlayingId] = useState(null);
  const audioRefs = useRef({});

  const handlePlayPause = (id) => {
    if (playingId && playingId !== id) {
      audioRefs.current[playingId]?.pause();
    }

    const audio = audioRefs.current[id];
    if (audio) {
      if (audio.paused) {
        audio.play();
        setPlayingId(id);
      } else {
        audio.pause();
        setPlayingId(null);
      }
    }
  };

  return (
    <>
      <div
        className="border-0 rounded-3 border position-relative mb-4 play-for-rtl"
        style={{
          background: "linear-gradient(84deg, #23272E 3.5%, #526077 94.93%)",
        }}
      >
        <Swiper
          slidesPerView={1}
          pagination={{
            clickable: true,
          }}
          modules={[Pagination]}
          className="mastering-digital-marketing-slide z-0"
        >
          {audioData.map((track) => (
            <SwiperSlide key={track.id}>
              <div
                className="card-body px-4"
                style={{
                  paddingTop: "37px",
                  paddingBottom: "24px",
                }}
              >
                <span
                  className="d-inline-block text-white fd-12 fw-medium rounded-pill mb-2"
                  style={{
                    padding: "0 11px",
                    background: "#526077",
                  }}
                >
                  Featured
                </span>

                <h3 className="fs-28 fw-medium text-body-bg mb-1">
                  {track.title}
                </h3>

                <p
                  className="text-light"
                  style={{
                    maxWidth: "370px",
                    marginBottom: "18px",
                  }}
                >
                  {track.description}
                </p>

                <div className="d-flex flex-wrap gap-2 align-items-center">
                  <div
                    className="d-flex align-items-center rounded-pill"
                    style={{
                      border: "1px solid #64748B",
                      padding: "3.5px 12px",
                    }}
                  >
                    <span className="fs-14 fw-semibold text-body-bg">
                      Host:
                    </span>
                    <span className="ms-2 text-body-bg">{track.host}</span>
                  </div>

                  <div
                    className="d-flex align-items-center rounded-pill"
                    style={{
                      border: "1px solid #64748B",
                      padding: "3.5px 12px",
                    }}
                  >
                    <span className="fs-14 fw-semibold text-body-bg">
                      Guest:
                    </span>
                    <span className="ms-2 text-body-bg">{track.guest}</span>
                  </div>
                </div>

                <div
                  className="audio-player-for-wave"
                  style={{ padding: "47px 0" }}
                >
                  <div className="d-sm-flex align-items-center">
                    <button
                      className="play-button border-0 rounded-circle d-inline-block"
                      style={{
                        backgroundColor: "#C2CDFF",
                        width: "44px",
                        height: "44px",
                        lineHeight: "43px",
                      }}
                      onClick={() => handlePlayPause(track.id)}
                    >
                      <i
                        className={`play-icon ${
                          playingId === track.id
                            ? "ri-pause-fill"
                            : "ri-play-large-fill"
                        } text-primary fs-28 position-relative`}
                        style={{ left: "2px" }}
                      ></i>
                    </button>

                    <audio
                      ref={(el) => (audioRefs.current[track.id] = el)}
                      src={track.audioSrc}
                    ></audio>

                    <div className="ms-sm-3 mt-3 mt-sm-0">
                      <div
                        className="d-flex align-items-center justify-content-between width-form-mobile"
                        style={{
                          width: "325px",
                        }}
                      >
                        <div className="wave-container d-flex align-items-end">
                          {[...Array(50)].map((_, i) => (
                            <span key={i} className="wave-bar"></span>
                          ))}
                        </div>
                      </div>
                    </div>
                  </div>

                  <audio
                    className="audio-element"
                    src="https://cldup.com/qR72ozoaiQ.mp3"
                    style={{
                      left: "0",
                    }}
                  ></audio>
                </div>

                <div className="d-flex flex-wrap gap-4 align-items-center">
                  <div className="d-flex align-items-center">
                    <i className="ri-customer-service-line fs-28 text-primary lh-1 position-relative top-2"></i>
                    <div className="flex-grow-1 ms-10">
                      <span className="text-light fs-12 fw-semibold lh-1">
                        Listens
                      </span>
                      <span className="d-block text-white fs-14 fw-medium lh-1">
                        {track.listens}
                      </span>
                    </div>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-thumb-up-line fs-28 text-primary lh-1 position-relative top-2"></i>
                    <div className="flex-grow-1 ms-10">
                      <span className="text-light fs-12 fw-semibold lh-1">
                        Likes
                      </span>
                      <span className="d-block text-white fs-14 fw-medium lh-1">
                        {track.likes}
                      </span>
                    </div>
                  </div>
                  <div className="d-flex align-items-center">
                    <i className="ri-share-line fs-28 text-primary lh-1 position-relative top-2"></i>
                    <div className="flex-grow-1 ms-10">
                      <span className="text-light fs-12 fw-semibold lh-1">
                        Shares
                      </span>
                      <span className="d-block text-white fs-14 fw-medium lh-1">
                        {track.shares}
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <Image
                src={track.image}
                className="position-absolute bottom-0 end-0 z-n1 for-rtl-shape d-none d-md-block"
                alt="shape"
                width={300}
                height={300}
              />
            </SwiperSlide>
          ))}
        </Swiper>
      </div>
    </>
  );
};

export default FeaturedMusic;
