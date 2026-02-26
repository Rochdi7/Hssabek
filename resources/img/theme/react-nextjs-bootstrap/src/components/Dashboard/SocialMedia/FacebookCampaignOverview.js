"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const FacebookCampaignOverview = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Impressions",
      type: "column",
      data: [400, 600, 300, 700, 450, 400, 600],
    },
    {
      name: "Cost per Conversion",
      type: "line",
      data: [500, 700, 600, 900, 700, 800, 950],
    },
    {
      name: "Clicks",
      type: "column",
      data: [500, 380, 500, 600, 340, 400, 250],
    },
    {
      name: "CTR",
      type: "column",
      data: [400, 350, 300, 250, 500, 600, 400],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#605DFF", "#BF85FB", "#37D80A", "#FD5812"],
    grid: {
      borderColor: "#ECEEF2",
      strokeDashArray: 8,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: [2, 2.1],
      curve: ["straight", "smooth"],
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
      },
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
          fontWeight: 400,
          fontFamily: "Inter",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      max: 1000,
      min: 0,
      labels: {
        style: {
          colors: "#64748B",
          fontSize: "12px",
          fontWeight: 400,
          fontFamily: "Inter",
        },
        formatter: (val) => {
          return "$" + val + "";
        },
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
    legend: {
      show: false,
    },
    plotOptions: {
      bar: {
        columnWidth: "25%",
        borderRadius: 2,
      },
    },
    tooltip: {
      y: {
        formatter: (val) => {
          return "$" + val + "";
        },
      },
    },
  };

  return (
    <>
      <Card className="custom-shadow rounded-3 bg-white border mb-4">
        <div className="p-4">
          <div className="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
            <div>
              <h3 className="fs-20 fw-semibold mb-0">
                Facebook Campaign Overview
              </h3>
              <span style={{ color: "#8695aa" }}>
                Track campaign success at a glance!
              </span>
            </div>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-transparent border text-body rounded-2"
                style={{
                  paddingRight: "35px",
                }}
              >
                Sep 1 - Sep 30
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Sep 1 - Sep 30
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Jun 1 - Jun 30
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Apr 1 - Apr 30
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  May 1 - May 30
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div className="d-flex flex-wrap align-items-center mb-4 lh-1">
            <i
              className="ri-bookmark-line fs-16"
              style={{ color: "#FF4023" }}
            ></i>
            <span className="ms-1 fs-16 fw-medium text-secondary">
              Summer Sale Boost
            </span>
          </div>

          <div className="row align-items-center">
            <div className="col-lg-9 col-sm-8">
              <div style={{ margin: "-4px -10px -26px -17px" }}>
                {Chart && (
                  <Chart
                    options={options}
                    series={series}
                    type="line"
                    height={292}
                  />
                )}
              </div>
            </div>

            <div className="col-lg-3 col-sm-4">
              <div className="last-child-none ms-xxl-3 d-flex d-sm-block flex-wrap gap-2 justify-content-between mt-4 mt-sm-0">
                <div className="d-flex child mb-4">
                  <span
                    className="d-inline-block bg-primary rounded-circle position-relative top-2"
                    style={{
                      width: "10px",
                      height: "10px",
                    }}
                  ></span>
                  <div className="ms-10">
                    <span className="fw-medium text-secondary d-block lh-1">
                      45,000
                    </span>
                    <span className="fs-12">Impressions</span>
                  </div>
                </div>

                <div className="d-flex child mb-4">
                  <span
                    className="d-inline-block bg-success rounded-circle position-relative top-2"
                    style={{
                      width: "10px",
                      height: "10px",
                    }}
                  ></span>
                  <div className="ms-10">
                    <span className="fw-medium text-secondary d-block lh-1">
                      4,200
                    </span>
                    <span className="fs-12">Clicks</span>
                  </div>
                </div>

                <div className="d-flex child mb-4">
                  <span
                    className="d-inline-block bg-danger rounded-circle position-relative top-2"
                    style={{
                      width: "10px",
                      height: "10px",
                    }}
                  ></span>
                  <div className="ms-10">
                    <span className="fw-medium text-secondary d-block lh-1">
                      9.3%
                    </span>
                    <span className="fs-12">CTR</span>
                  </div>
                </div>

                <div className="d-flex child mb-4">
                  <span
                    className="d-inline-block rounded-circle position-relative top-2"
                    style={{
                      width: "10px",
                      height: "10px",
                      backgroundColor: "#BF85FB",
                    }}
                  ></span>
                  <div className="ms-10">
                    <span className="fw-medium text-secondary d-block lh-1">
                      $5.50
                    </span>
                    <span className="fs-12">Cost per Conversion</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </Card>
    </>
  );
};

export default FacebookCampaignOverview;
