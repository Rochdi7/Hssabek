"use client";

import React, { useState } from "react";
import Image from "next/image";
import { Row, Col } from "react-bootstrap";

const DishDetailsContent = () => {
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <Row>
        <Col lg={4}>
          <div className="mb-4">
            <div className="dish-details-images-card bg-white">
              {activeTab === 0 && (
                <>
                  <Image
                    src="/images/restaurant/dish-details1.jpg"
                    alt="dish"
                    width={640}
                    height={660}
                    style={{
                      borderRadius: "7px",
                      width: "100%",
                    }}
                  />
                </>
              )}
              {activeTab === 1 && (
                <>
                  <Image
                    src="/images/restaurant/dish-details2.jpg"
                    alt="dish"
                    width={640}
                    height={660}
                    style={{
                      borderRadius: "7px",
                      width: "100%",
                    }}
                  />
                </>
              )}
              {activeTab === 2 && (
                <>
                  <Image
                    src="/images/restaurant/dish-details3.jpg"
                    alt="dish"
                    width={640}
                    height={660}
                    style={{
                      borderRadius: "7px",
                      width: "100%",
                    }}
                  />
                </>
              )}
              {activeTab === 3 && (
                <>
                  <Image
                    src="/images/restaurant/dish-details4.jpg"
                    alt="dish"
                    width={640}
                    height={660}
                    style={{
                      borderRadius: "7px",
                      width: "100%",
                    }}
                  />
                </>
              )}
            </div>

            <div className="d-flex align-items-center gap-3">
              <div
                onClick={() => handleTabClick(0)}
                className={`border rounded-3 cursor-pointer ${
                  activeTab === 0 ? "border-color-primary" : ""
                }`}
              >
                <Image
                  src="/images/restaurant/dish-details1.jpg"
                  alt="dish"
                  width={117}
                  height={120}
                  style={{
                    borderRadius: "7px",
                  }}
                />
              </div>

              <div
                onClick={() => handleTabClick(1)}
                className={`border rounded-3 cursor-pointer ${
                  activeTab === 1 ? "border-color-primary" : ""
                }`}
              >
                <Image
                  src="/images/restaurant/dish-details2.jpg"
                  alt="dish"
                  width={117}
                  height={120}
                  style={{
                    borderRadius: "7px",
                  }}
                />
              </div>

              <div
                onClick={() => handleTabClick(2)}
                className={`border rounded-3 cursor-pointer ${
                  activeTab === 2 ? "border-color-primary" : ""
                }`}
              >
                <Image
                  src="/images/restaurant/dish-details3.jpg"
                  alt="dish"
                  width={117}
                  height={120}
                  style={{
                    borderRadius: "7px",
                  }}
                />
              </div>

              <div
                onClick={() => handleTabClick(3)}
                className={`border rounded-3 cursor-pointer ${
                  activeTab === 3 ? "border-color-primary" : ""
                }`}
              >
                <Image
                  src="/images/restaurant/dish-details4.jpg"
                  alt="dish"
                  width={117}
                  height={120}
                  style={{
                    borderRadius: "7px",
                  }}
                />
              </div>
            </div>
          </div>
        </Col>

        <Col lg={8}>
          <div className="dish-details-card d-block bg-white border-0 shadow-none mb-4">
            <div className="trezo-card-content">
              <div className="d-md-flex align-items-center justify-content-between">
                <div>
                  <span className="d-block text-xs">Code: 3479</span>
                  <h3>Beef Cheesy Burger</h3>
                  <span className="price fw-semibold">$11.50 USD</span>
                </div>
                <div className="ratings lh-1">
                  <i className="ri-star-fill"></i>
                  <i className="ri-star-fill"></i>
                  <i className="ri-star-fill"></i>
                  <i className="ri-star-fill"></i>
                  <i className="ri-star-fill"></i>
                  <span className="d-inline-block lh-1 text-xs text-body">
                    5.0
                  </span>
                </div>
              </div>
              <div className="border-top"></div>
              <h4 className="fw-semibold">Ingredients Details</h4>
              <p>
                Spaghetti, shredded chicken, buffalo sauce, ranch dressing,
                mozzarella.
              </p>
              <div className="mb-25"></div>
              <h4 className="fw-semibold">Nutrition Values</h4>
              <div className="nutrition-values">
                <div className="row g-0">
                  <div className="col-md-6">
                    <div className="item d-flex align-items-center justify-content-between">
                      <span className="d-block">Calories</span>
                      <span className="d-block">
                        <span className="text-black">1200</span> Kcal
                      </span>
                    </div>
                  </div>
                  <div className="col-md-6">
                    <div className="item d-flex align-items-center justify-content-between">
                      <span className="d-block">Carbs</span>
                      <span className="d-block">
                        <span className="text-black">120</span> gm
                      </span>
                    </div>
                  </div>
                  <div className="col-md-6">
                    <div className="item d-flex align-items-center justify-content-between">
                      <span className="d-block">Protein</span>
                      <span className="d-block">
                        <span className="text-black">120</span> gm
                      </span>
                    </div>
                  </div>
                  <div className="col-md-6">
                    <div className="item d-flex align-items-center justify-content-between">
                      <span className="d-block">Fibres</span>
                      <span className="d-block">
                        <span className="text-black">400</span> gm
                      </span>
                    </div>
                  </div>
                  <div className="col-md-6">
                    <div className="item d-flex align-items-center justify-content-between">
                      <span className="d-block">Fat</span>
                      <span className="d-block">
                        <span className="text-black">890</span> gm
                      </span>
                    </div>
                  </div>
                  <div className="col-md-6">
                    <div className="item d-flex align-items-center justify-content-between">
                      <span className="d-block">Vitamins</span>
                      <span className="d-block">
                        <span className="text-black">350</span> gm
                      </span>
                    </div>
                  </div>
                  <div className="col-md-6">
                    <div className="item d-flex align-items-center justify-content-between">
                      <span className="d-block">Sugar</span>
                      <span className="d-block">
                        <span className="text-black">30</span> gm
                      </span>
                    </div>
                  </div>
                  <div className="col-md-6">
                    <div className="item d-flex align-items-center justify-content-between">
                      <span className="d-block">Minerals</span>
                      <span className="d-block">
                        <span className="text-black">5</span> gm
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <h4 className="fw-semibold mb-0 d-flex align-items-center justify-content-between">
                Orders In Queue <span>17</span>
              </h4>
            </div>
          </div>
        </Col>
      </Row>
    </>
  );
};

export default DishDetailsContent;
