"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";
import Image from "next/image";

const NewEmployees = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [30];

  const options = {
    colors: ["#9135E8"],
    plotOptions: {
      radialBar: {
        hollow: {
          margin: 0,
          size: "50%",
          background: "#fff",
          margin: 10,
        },
        track: {
          background: "#EDEEF0",
        },
        dataLabels: {
          name: {
            offsetY: -10,
            color: "#4b9bfa",
            fontSize: ".625rem",
            show: false,
          },
          value: {
            show: true,
            offsetY: 5,
            color: "#9135E8",
            fontSize: "14px",
            fontWeight: 500,
            fontFamily: "Inter",
          },
        },
      },
    },
    stroke: {
      lineCap: "round",
    },
    labels: ["Status"],
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <div className="custom-padding-30 position-relative">
          <div className="d-flex align-items-center mb-4 pb-2">
            <div className="flex-shrink-0">
              <div
                className="text-center rounded-2 bg-primary-div-50"
                style={{ width: "44px", height: "44px", lineHeight: "44px" }}
              >
                <Image
                  src="/images/new-employees.svg"
                  alt="icon-employees"
                  width={25}
                  height={20}
                />
              </div>
            </div>
            <div className="flex-grow-1 ms-3">
              <span className="d-block mb-1">New Employees</span>
              <h3 className="fw-medium fs-20 mb-0">8,24</h3>
            </div>
          </div>

          <div className="d-flex align-items-center">
            <i
              className="ri-arrow-right-up-line d-inline-block text-center rounded-1 fs-18 text-success-50"
              style={{
                width: "26px",
                height: "26px",
                lineHeight: "26px",
                backgroundColor: "#D8FFC8",
              }}
            ></i>
            <p className="ms-2">
              <span className="text-secondary fw-medium">+10%</span> last year
            </p>
          </div>

          <div>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="radialBar"
                height={140}
                width={140}
                className="chart-position top-50 translate-middle-y me-1 mt-2"
              />
            )}
          </div>
        </div>
      </Card>
    </>
  );
};

export default NewEmployees;
