"use client";

import React, { useEffect, useState } from "react";
import { Row, Col, Card, Dropdown } from "react-bootstrap";
import Image from "next/image";
import SalesByCategoryProducts from "./SalesByCategoryProducts";

const SalesAnalytics = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Sales Over Time",
      data: [60, 80, 50, 60, 70, 40, 80],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#C2CDFF"],
    plotOptions: {
      bar: {
        columnWidth: "30%",
        borderRadius: 4,
      },
    },
    fill: {
      opacity: [0.85, 0.25, 1],
      gradient: {
        inverseColors: false,
        shade: "light",
        type: "vertical",
        opacityFrom: 0.85,
        opacityTo: 0.55,
        stops: [0, 100, 100, 100],
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
      width: 0,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
          fontFamily: "Inter",
        },
      },
    },
    yaxis: {
      show: false,
      tickAmount: 4,
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
          fontFamily: "Inter",
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
    tooltip: {
      y: {
        formatter: (val) => {
          return "$" + val + "K";
        },
      },
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      fontFamily: "Inter",
      fontWeight: 400,
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
    states: {
      hover: {
        filter: {
          type: "darken",
          value: 0.1,
        },
      },
    },
  };

  return (
    <>
      <Card className="custom-shadow for-dark-rounded-bg rounded-3 border mb-4 bg-body-bg">
        <div
          className="d-flex justify-content-between align-items-center flex-wrap gap-3"
          style={{
            padding: "14.5px 25px",
          }}
        >
          <h3 className="mb-0 fs-16 fw-normal text-secondary">
            Sales Analytics
          </h3>

          <Dropdown
            className="dropdown select-dropdown without-border position-relative"
            style={{
              right: "-10px",
              top: "2px",
            }}
          >
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="dropdown-toggle bg-transparent border text-body rounded-2"
              style={{
                paddingRight: "20px",
              }}
            >
              Last Month
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Last Day
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Last Week
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Last Month
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Last Year
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <Card.Body className="bg-white p-4 rounded-top-3 border-top">
          <Row className="align-items-center">
            <Col lg={6} className="mt-4">
              <div className="d-flex align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <div
                      className="rounded-2 text-center"
                      style={{
                        backgroundColor: "#DDE4FF",
                        width: "44px",
                        height: "44px",
                        lineHeight: "44px",
                      }}
                    >
                      <Image
                        src="/images/sales-over-time-icon.svg"
                        alt="sales-over-time-icon"
                        width={24}
                        height={24}
                      />
                    </div>
                  </div>
                  <div className="flex-grow-1 ms-10">
                    <span>Sales Over Time</span>
                    <h3 className="fs-24 fw-semibold mb-0">$120,000</h3>
                  </div>
                </div>

                <span
                  className="text-success-50 p-2 py-1 d-inline-block rounded-1 ms-10"
                  style={{
                    backgroundColor: "#D8FFC8",
                  }}
                >
                  +9.1%
                </span>
              </div>

              <p style={{ lineHeight: "1.44", maxWidth: "284px" }}>
                Sales have shown a positive trend, with a significant increase
                of 9.1% over the previous month.
              </p>
            </Col>

            <Col lg={6}>
              <div style={{ margin: "-7px -20px -14px 0" }}>
                {Chart && (
                  <Chart
                    options={options}
                    series={series}
                    type="bar"
                    height={197}
                  />
                )}
              </div>
            </Col>
          </Row>
        </Card.Body>

        <div
          className="card-body bg-white px-4 rounded-bottom-3 border-top"
          style={{
            paddingTop: "40px",
            paddingBottom: "42px",
          }}
        >
          <Row>
            <Col md={3}>
              <SalesByCategoryProducts />
            </Col>

            <Col md={9}>
              <h3 className="mb-3 pb-1 fs-16 fw-medium mt-4 mt-sm-0">
                Sales by Category/Products{" "}
                <span className="fs-14 fw-normal text-body">
                  (Top Performing)
                </span>
              </h3>

              <div className="d-flex flex-wrap gap-3 justify-content-between">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <div
                      className="rounded-2 text-center"
                      style={{
                        backgroundColor: "#F3E8FF",
                        width: "44px",
                        height: "44px",
                        lineHeight: "44px",
                      }}
                    >
                      <Image
                        src="/images/electronics-icon.svg"
                        alt="electronics-icon"
                        width={24}
                        height={24}
                      />
                    </div>
                  </div>
                  <div className="flex-grow-1 ms-10">
                    <span>Electronics</span>
                    <h3 className="fs-20 fw-medium mb-0">$35,000</h3>
                  </div>
                </div>

                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <div
                      className="rounded-2 text-center"
                      style={{
                        backgroundColor: "#D8FFC8",
                        width: "44px",
                        height: "44px",
                        lineHeight: "44px",
                      }}
                    >
                      <Image
                        src="/images/clothing-icon.svg"
                        alt="clothing-icon"
                        width={24}
                        height={24}
                      />
                    </div>
                  </div>
                  <div className="flex-grow-1 ms-10">
                    <span>Clothing</span>
                    <h3 className="fs-20 fw-medium mb-0">$25,000</h3>
                  </div>
                </div>

                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <div
                      className="rounded-2 text-center"
                      style={{
                        backgroundColor: "#DAEBFF",
                        width: "44px",
                        height: "44px",
                        lineHeight: "44px",
                      }}
                    >
                      <Image
                        src="/images/home-goods-icon.svg"
                        alt="home-goods-icon"
                        width={24}
                        height={24}
                      />
                    </div>
                  </div>
                  <div className="flex-grow-1 ms-10">
                    <span>Home Goods</span>
                    <h3 className="fs-20 fw-medium mb-0">$18,000</h3>
                  </div>
                </div>
              </div>
            </Col>
          </Row>
        </div>
      </Card>
    </>
  );
};

export default SalesAnalytics;
