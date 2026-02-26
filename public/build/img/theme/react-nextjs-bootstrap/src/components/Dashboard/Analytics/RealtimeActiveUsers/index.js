"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";
import { Card } from "react-bootstrap";

const RealtimeActiveUsers = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Users",
      data: [
        100, 90, 85, 95, 100, 100, 90, 85, 95, 100, 100, 90, 85, 95, 100, 100,
        90, 85, 95, 100, 100, 90, 85, 95, 100, 100, 90, 85, 95, 100,
      ],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#757DFF"],
    plotOptions: {
      bar: {
        columnWidth: "100%",
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 3,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
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
      tickAmount: 5,
      max: 100,
      min: 0,
      labels: {
        show: false,
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
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
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card
        className="border-0 rounded-3 p-4 position-relative mb-4 bg-4936F5 realtime-for-dark" 
      >
        <Image
          src="/images/shape-3.png"
          className="position-absolute top-0 end-0"
          alt="shape"
          width={120}
          height={160}
        />

        <span className="fs-16 fw-normal text-border-color d-block mb-1">
          Realtime Active Users
        </span>

        <h2 className="lh-1 fs-36 mb-0 fw-medium text-white mb-5">4,890</h2>

        <span
          className="d-block mb-2 text-white fs-14 fw-normal pb-2"
          style={{ borderBottom: "1px solid #605DFF" }}
        >
          Page views per second
        </span>

        <div
          className="text-center"
          style={{ margin: "-10px -20px -10px -32px" }}
        >
          {Chart && (
            <Chart options={options} series={series} type="bar" height={170} />
          )}
        </div>

        <ul className="ps-0 mb-0 list-unstyled">
          <li
            className="pb-1 mb-2"
            style={{ borderBottom: "1px solid #605DFF" }}
          >
            <span className="fs-14 fw-semibold text-white">
              Top Active Pages
            </span>
          </li>

          <li
            className="pb-1 mb-1 d-flex justify-content-between align-items-center"
            style={{ borderBottom: "1px solid #605DFF" }}
          >
            <p className="fs-14 fw-normal text-white mb-0">
              /monitoring/user-activity {' '}
              <a href="#" className="text-decoration-none">
                <i className="ri-external-link-line text-white fs-16"></i>
              </a>
            </p>
            <span className="fs-14 fw-normal text-white">1520</span>
          </li>

          <li
            className="pb-1 mb-1 d-flex justify-content-between align-items-center"
            style={{ borderBottom: "1px solid #605DFF" }}
          >
            <p className="fs-14 fw-normal text-white mb-0">
              /monitoring/user-activity {' '}
              <a href="#" className="text-decoration-none">
                <i className="ri-external-link-line text-white fs-16"></i>
              </a>
            </p>
            <span className="fs-14 fw-normal text-white">980</span>
          </li>

          <li
            className="pb-1 mb-1 d-flex justify-content-between align-items-center"
            style={{ borderBottom: "1px solid #605DFF" }}
          >
            <p className="fs-14 fw-normal text-white mb-0">
              /specific/industry-comparisons {' '}
              <a href="#" className="text-decoration-none">
                <i className="ri-external-link-line text-white fs-16"></i>
              </a>
            </p>
            <span className="fs-14 fw-normal text-white">856</span>
          </li>

          <li
            className="pb-1 mb-1 d-flex justify-content-between align-items-center"
            style={{ borderBottom: "1px solid #605DFF" }}
          >
            <p className="fs-14 fw-normal text-white mb-0">
              /global-reach-2023/statistics {' '}
              <a href="#" className="text-decoration-none">
                <i className="ri-external-link-line text-white fs-16"></i>
              </a>
            </p>
            <span className="fs-14 fw-normal text-white">735</span>
          </li>

          <li
            className="pb-1 mb-1 d-flex justify-content-between align-items-center"
            style={{ borderBottom: "1px solid #605DFF" }}
          >
            <p className="fs-14 fw-normal text-white mb-0">
              /security-alerts/2024-update {' '}
              <a href="#" className="text-decoration-none">
                <i className="ri-external-link-line text-white fs-16"></i>
              </a>
            </p>
            <span className="fs-14 fw-normal text-white">520</span>
          </li>

          <li className="d-flex justify-content-end mt-4">
            <a href="#" className="btn btn-outline-primary text-white">
              All Real-Time Report
              <i className="ri-arrow-right-s-line"></i>
            </a>
          </li>
        </ul>
      </Card>
    </>
  );
};

export default RealtimeActiveUsers;
