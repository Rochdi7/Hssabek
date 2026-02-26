"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";
import Image from "next/image";

const TotalEmployees = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Employees",
      data: [3, 12, 8, 15, 8, 10, 15],
    },
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    colors: ["#4936F5"],
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 90, 100],
      },
    },
    dataLabels: {
      enabled: false,
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    stroke: {
      curve: "smooth",
      width: 0,
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
        formatter: (val) => {
          return val + "%";
        },
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
    },
    legend: {
      show: false,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
        shape: "diamond",
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "Total:" + val;
        },
      },
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <div className="custom-padding-30 position-relative">
          <div className="d-flex align-items-center mb-4 pb-2">
            <div className="flex-shrink-0">
              <div
                className="text-center rounded-2 bg-primary-50"
                style={{ width: "44px", height: "44px", lineHeight: "44px" }}
              >
                <Image
                  src="/images/icon-employees.svg"
                  alt="icon-employees"
                  width={25}
                  height={20}
                />
              </div>
            </div>
            <div className="flex-grow-1 ms-3">
              <span className="d-block mb-1">Total Employees</span>
              <h3 className="fw-medium fs-20 mb-0">15,720</h3>
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
              <span className="text-secondary fw-medium">+12%</span> last year
            </p>
          </div>

          <div>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
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

export default TotalEmployees;
