"use client";

import React, { useState } from "react";
import { Row, Col, Card } from "react-bootstrap";

const MostPopular = () => {
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <Card
        className="custom-shadow rounded-3 bg-white border mb-4 custom-padding-30"
        style={{
          paddingBottom: "18px",
        }}
      >
        <div
          className="d-flex justify-content-between align-items-center flex-wrap gap-3 position-relative pb-3"
          style={{ top: "-5px" }}
        >
          <h3 className="mb-0 fs-18 fw-semibold">Most Popular</h3>
          <button
            className="bg-transparent border-0 p-0 d-flex align-items-center text-decoration-none position-relative text-body"
            style={{ right: "-8px" }}
          >
            <span>View All</span>
            <i className="ri-arrow-right-s-line fs-24 position-relative top-1 lh-1 text-body"></i>
          </button>
        </div>

        <ul className="nav nav-tabs gap-2 most-popular-tabs border-0 mb-20">
          <li className="nav-item" role="presentation">
            <button
              onClick={() => handleTabClick(0)}
              className={`nav-link bg-border-color rounded-pill fs-12 fw-medium text-body border-0 ${
                activeTab === 0 ? "active" : ""
              }`}
            >
              Marketing
            </button>
          </li>

          <li className="nav-item" role="presentation">
            <button
              onClick={() => handleTabClick(1)}
              className={`nav-link bg-border-color rounded-pill fs-12 fw-medium text-body border-0 ${
                activeTab === 1 ? "active" : ""
              }`}
            >
              Content
            </button>
          </li>

          <li className="nav-item" role="presentation">
            <button
              onClick={() => handleTabClick(2)}
              className={`nav-link bg-border-color rounded-pill fs-12 fw-medium text-body border-0 ${
                activeTab === 2 ? "active" : ""
              }`}
            >
              Social
            </button>
          </li>

          <li className="nav-item" role="presentation">
            <button
              onClick={() => handleTabClick(3)}
              className={`nav-link bg-border-color rounded-pill fs-12 fw-medium text-body border-0 ${
                activeTab === 3 ? "active" : ""
              }`}
            >
              Analytics
            </button>
          </li>

          <li className="nav-item" role="presentation">
            <button
              onClick={() => handleTabClick(4)}
              className={`nav-link bg-border-color rounded-pill fs-12 fw-medium text-body border-0 ${
                activeTab === 4 ? "active" : ""
              }`}
            >
              Customer
            </button>
          </li>

          <li className="nav-item" role="presentation">
            <button
              onClick={() => handleTabClick(5)}
              className={`nav-link bg-border-color rounded-pill fs-12 fw-medium text-body border-0 ${
                activeTab === 5 ? "active" : ""
              }`}
            >
              Trends
            </button>
          </li>
        </ul>

        <div>
          {activeTab === 0 && (
            <Row>
              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-7.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Influencer Marketing
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda Garcia</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        6,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4 active">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-8.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Data for Better Ads
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: David Chen</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,500
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-9.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Boosting Engagement
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Lisa Kim</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-10.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Real Engagement Metrics
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Sarah Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,700
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-11.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    SEO for E-Commerce
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,900
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-12.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Podcast Marketing 101
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,400
                      </span>
                    </div>
                  </div>
                </div>
              </Col>
            </Row>
          )}
          {activeTab === 1 && (
            <Row>
              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-11.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    SEO for E-Commerce
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,900
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-12.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Podcast Marketing 101
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,400
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-7.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Influencer Marketing
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda Garcia</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        6,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4 active">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-8.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Data for Better Ads
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: David Chen</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,500
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-9.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Boosting Engagement
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Lisa Kim</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-10.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Real Engagement Metrics
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Sarah Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,700
                      </span>
                    </div>
                  </div>
                </div>
              </Col>
            </Row>
          )}

          {activeTab === 2 && (
            <Row>
              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-9.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Boosting Engagement
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Lisa Kim</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-7.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Influencer Marketing
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda Garcia</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        6,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4 active">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-8.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Data for Better Ads
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: David Chen</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,500
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-10.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Real Engagement Metrics
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Sarah Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,700
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-11.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    SEO for E-Commerce
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,900
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-12.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Podcast Marketing 101
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,400
                      </span>
                    </div>
                  </div>
                </div>
              </Col>
            </Row>
          )}

          {activeTab === 3 && (
            <Row>
              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-9.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Boosting Engagement
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Lisa Kim</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-10.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Real Engagement Metrics
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Sarah Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,700
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-7.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Influencer Marketing
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda Garcia</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        6,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4 active">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-8.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Data for Better Ads
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: David Chen</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,500
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-11.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    SEO for E-Commerce
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,900
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-12.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Podcast Marketing 101
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,400
                      </span>
                    </div>
                  </div>
                </div>
              </Col>
            </Row>
          )}

          {activeTab === 4 && (
            <Row>
              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4 active">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-8.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Data for Better Ads
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: David Chen</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,500
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-9.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Boosting Engagement
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Lisa Kim</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-10.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Real Engagement Metrics
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Sarah Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,700
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-7.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Influencer Marketing
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda Garcia</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        6,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-11.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    SEO for E-Commerce
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,900
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-12.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Podcast Marketing 101
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,400
                      </span>
                    </div>
                  </div>
                </div>
              </Col>
            </Row>
          )}

          {activeTab === 5 && (
            <Row>
              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-7.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Influencer Marketing
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda Garcia</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        6,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-10.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Real Engagement Metrics
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Sarah Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,700
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-11.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    SEO for E-Commerce
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Johnson</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,900
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-12.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Podcast Marketing 101
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Amanda</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,400
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4 active">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-8.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Data for Better Ads
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: David Chen</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        8,500
                      </span>
                    </div>
                  </div>
                </div>
              </Col>

              <Col sm={6} md={4}>
                <div className="position-relative single-play mb-4">
                  <div
                    className="position-relative bg-img rounded-3"
                    style={{
                      backgroundImage: "url(/images/played-9.jpg)",
                      height: "183px",
                    }}
                  >
                    <div className="position-absolute bottom-0 start-0 ps-3 pb-3">
                      <button
                        className="p-0 border-0 bg-primary rounded-circle audio-play-btn"
                        style={{
                          width: "44px",
                          height: "44px",
                          lineHeight: "29px",
                        }}
                      >
                        <audio className="track">
                          <source
                            src="https://cldup.com/qR72ozoaiQ.mp3"
                            type="audio/mpeg"
                          />
                        </audio>
                        <div className="player-container style-two">
                          <div className="play-pause">Play</div>
                        </div>
                      </button>
                    </div>
                  </div>
                  <h3 className="fs-14 fw-medium mt-3 mb-2">
                    Boosting Engagement
                  </h3>
                  <div className="d-flex flex-wrap">
                    <span className="fs-12">By: Lisa Kim</span>
                    <div className="d-flex align-items-center ms-4">
                      <i className="ri-customer-service-line text-primary fs-15 lh-1"></i>
                      <span className="d-block fs-12 fw-normal text-body ms-10">
                        9,300
                      </span>
                    </div>
                  </div>
                </div>
              </Col>
            </Row>
          )}
        </div>
      </Card>
    </>
  );
};

export default MostPopular;
