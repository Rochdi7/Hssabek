"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";
import Image from "next/image";

const InboundCalls = () => {
  // Chart
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Inbound Calls",
      data: [
        100, 130, 115, 170, 110, 120, 160, 100, 200, 105, 130, 130, 170, 150,
        155, 190, 165,
      ],
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
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
      width: 1,
    },
    colors: ["#605DFF"],
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0.5,
        opacityTo: 0.5,
      },
    },
    xaxis: {
      categories: [
        "01 Jan",
        "02 Jan",
        "03 Jan",
        "04 Jan",
        "05 Jan",
        "06 Jan",
        "07 Jan",
        "08 Jan",
        "09 Jan",
        "10 Jan",
        "11 Jan",
        "12 Jan",
        "13 Jan",
        "14 Jan",
        "15 Jan",
        "16 Jan",
        "17 Jan",
      ],
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
      show: false,
      max: 220,
      min: 0,
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: true,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: true,
        color: "#ECEEF2",
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        size: 6,
        offsetX: -2,
        offsetY: -0.5,
        shape: "circle",
      },
    },
  };

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="custom-padding-30">
          <div className="d-flex justify-content-between align-items-start mb-3 mb-md-4">
            <div>
              <h3 className="mb-0 fw-semibold">Inbound Calls</h3>
              <p className="fs-12">Overview of incoming call volume</p>
            </div>

            <Dropdown className="action-opt" align="end">
              <Dropdown.Toggle
                variant="link"
                className="text-decoration-none bg-transparent p-0 d-flex align-items-center text-body"
                id="dropdown-basic"
              >
                <span className="fs-14 lh-1">Today</span>{" "}
                <i className="ri-arrow-down-s-line fs-20"></i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item className="px-3 py-2 text-start">
                  Last Day
                </Dropdown.Item>

                <Dropdown.Item className="px-3 py-2 text-start">
                  Last Week
                </Dropdown.Item>

                <Dropdown.Item className="px-3 py-2 text-start">
                  Last Month
                </Dropdown.Item>

                <Dropdown.Item className="px-3 py-2 text-start">
                  Last Year
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div style={{ margin: "-53px -9px -30px -11px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={155}
              />
            )}
          </div>

          <div className="d-flex align-items-center position-relative">
            <div className="d-flex align-items-center">
              <div className="flex-shrink-0">
                <div
                  className="bg-body-bg border text-center rounded-2"
                  style={{ width: "48px", height: "48px", lineHeight: "48px" }}
                >
                  <Image
                    src="/images/inbound-calls.svg"
                    alt="inbound-calls"
                    width={26}
                    height={26}
                  />
                </div>
              </div>
              <div className="flex-grow-1 ms-3">
                <h3 className="fs-28 fw-medium text-secondary mb-0">1,235</h3>
                <span className="text-body d-block">Past 24 hours</span>
              </div>
            </div>

            <span className="d-flex align-items-center align-items-center text-body ms-5">
              <i className="material-symbols-outlined fs-18 pe-2 text-success">
                trending_up
              </i>
              <span className="fw-medium me-1 text-secondary">+7.5%</span>
            </span>
          </div>
        </div>
      </Card>
    </>
  );
};

export default InboundCalls;
