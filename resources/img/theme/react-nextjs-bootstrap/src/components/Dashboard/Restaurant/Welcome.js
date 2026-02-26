"use client";

import React from "react";
import Image from "next/image";
import { Card } from "react-bootstrap";

const Welcome = () => {
  return (
    <>
      <Card className="border-0 rounded-3 bg-rating-color welcome-restaurant position-relative mb-4">
        <div className="mb-1">
          <span
            className="d-inline-block bg-dark fs-16 fw-medium"
            style={{
              padding: "1px 13px",
              color: "#FFE8D4",
            }}
          >
            Hello William!
          </span>
        </div>
        <h2>Here Your Restaurant Stats Today.</h2>

        <div className="d-flex align-items-center" style={{ gap: "40px" }}>
          <div className="d-flex" style={{ gap: "10px" }}>
            <div className="flex-shrink-0">
              <i className="material-symbols-outlined fs-24 text-border-color position-relative top-5">
                order_approve
              </i>
            </div>
            <div className="flex-grow-1">
              <span
                className="fs-14 d-block"
                style={{
                  color: "#FFE8D4",
                  marginBottom: "3px",
                }}
              >
                Total Order
              </span>
              <h4 className="mb-0 fs-16 fw-bold text-white">12051+</h4>
            </div>
          </div>
          <div className="d-flex" style={{ gap: "10px" }}>
            <div className="flex-shrink-0">
              <i className="material-symbols-outlined fs-24 text-border-color position-relative top-5">
                group
              </i>
            </div>
            <div className="flex-grow-1">
              <span
                className="fs-14 d-block"
                style={{
                  color: "#FFE8D4",
                  marginBottom: "3px",
                }}
              >
                Total Users
              </span>
              <h4 className="mb-0 fs-16 fw-bold text-white">153K+</h4>
            </div>
          </div>
        </div>

        <div className="dish-wrap">
          <Image
            src="/images/dish.png"
            className="dish-img"
            alt="dish"
            width={185}
            height={183}
          />
          <Image
            src="/images/dish-shape1.png"
            className="dish-shape1"
            alt="dish-shape"
            width={42}
            height={45}
          />
          <Image
            src="/images/dish-shape2.png"
            className="dish-shape2"
            alt="dish-shape"
            width={42}
            height={45}
          />
        </div>
      </Card>
    </>
  );
};

export default Welcome;
