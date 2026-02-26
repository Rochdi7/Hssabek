"use client";

import React from "react";
import Image from "next/image";

const Welcome = () => {
  return (
    <>
      <div
        className="doctor-welcome-card rounded-3 position-relative"
        style={{
          background: "linear-gradient(272deg, #1F64F1 31.27%, #123A8B 98.4%)",
        }}
      >
        <div className="d-flex flex-wrap justify-content-between align-items-center align-items-xl-end">
          <div className="py-xl-5">
            <span className="fs-18 text-white">Good Morning</span>

            <h2 className="fs-28 fw-900 text-white mt-2 mt-sm-2 my-2">
              Dr. Olivia John
            </h2>
            
            <div className="d-flex align-items-center gap-1 mb-1 mb-sm-2">
              <Image
                src="/images/heart.png"
                alt="heart"
                width={18}
                height={18}
              />
              <span className="text-white fs-12 fw-medium">
                CARDIO SPECIALIST
              </span>
            </div>

            <p className="mb-2 mb-xl-4" style={{ color: "#B1BBC8" }}>
              Today you have <span className="text-white">15</span>{" "}
              Consultations and <span className="text-white">12</span>{" "}
              Operations.
            </p>
          </div>

          <Image
            src="/images/andrew-rashel.png"
            className="mt-3 mt-sm-0"
            alt="andrew-rashel"
            width={210}
            height={240}
          />
        </div>

        <Image
          src="/images/shape-11.png"
          className="position-absolute bottom-0 end-0"
          alt="shape"
          width={844}
          height={220}
        />
      </div>
    </>
  );
};

export default Welcome;
