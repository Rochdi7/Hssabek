"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";
import Image from "next/image";

const ResignedEmployees = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Resigned",
      data: [44, 30, 57, 35, 61, 35, 63],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    plotOptions: {
      bar: {
        columnWidth: "50%",
        borderRadius: 2,
      },
    },
    colors: ["#EE3E08"],
    dataLabels: {
      enabled: false,
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    stroke: {
      width: 2,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: false,
        color: "#B1BBC8",
      },
      labels: {
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      show: false,
      labels: {
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "Total:" + val;
        },
      },
    },
    fill: {
      opacity: 1,
      colors: "#EE3E08",
      type: "solid",
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <div className="custom-padding-30 position-relative">
          <div className="d-flex align-items-center mb-4 pb-2">
            <div className="flex-shrink-0">
              <div
                className="text-center rounded-2 bg-danger-50"
                style={{ width: "44px", height: "44px", lineHeight: "44px" }}
              >
                <Image
                  src="/images/icon-resigned.svg"
                  alt="icon-resigned"
                  width={25}
                  height={20}
                />
              </div>
            </div>
            <div className="flex-grow-1 ms-3">
              <span className="d-block mb-1">Resigned Employees</span>
              <h3 className="fw-medium fs-20 mb-0">3,18</h3>
            </div>
          </div>

          <div className="d-flex align-items-center">
            <i
              className="ri-arrow-right-down-line d-inline-block text-center rounded-1 fs-18 text-danger-50"
              style={{
                width: "26px",
                height: "26px",
                lineHeight: "26px",
                backgroundColor: "#FFE8D4",
              }}
            ></i>
            <p className="ms-2">
              <span className="text-secondary fw-medium">-5%</span> last year
            </p>
          </div>

          <div>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={140}
                className="chart-position top-50 translate-middle-y"
              />
            )}
          </div>
        </div>
      </Card>
    </>
  );
};

export default ResignedEmployees;
