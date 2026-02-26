"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";
import Image from "next/image";

const StudentsOverview = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Boys",
      data: [70, 42, 70, 120, 40, 70, 90],
    },
    {
      name: "Girls",
      data: [-70, -44, -70, -120, -40, -70, -90],
    },
  ];

  const options = {
    chart: {
      stacked: true,
      toolbar: {
        show: false,
      },
    },
    colors: ["#3584FC", "#FD5812"],
    plotOptions: {
      bar: {
        columnWidth: "20%",
        borderRadius: 5,
        borderRadiusApplication: "end",
        borderRadiusWhenStacked: "all",
      },
    },
    dataLabels: {
      enabled: false,
    },
    grid: {
      borderColor: "#EDEFF5",
      strokeDashArray: 8,
      xaxis: {
        lines: {
          show: true,
        },
      },
      yaxis: {
        lines: {
          show: false,
        },
      },
    },
    legend: {
      show: true,
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
    xaxis: {
      categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      axisTicks: {
        show: false,
        color: "#8695AA",
      },
      axisBorder: {
        show: false,
        color: "#D5D9E2",
      },
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      show: false,
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "Status " + val + " K";
        },
      },
    },
  };

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="custom-padding-30">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-4">
            <h3 className="mb-0">Students Overview</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0 w-90"
              style={{ backgroundPosition: "right 0 center" }}
              aria-label="Default select example"
            >
              <option>Last Month</option>
              <option value="1">Last Week</option>
              <option value="2">Last Year</option>
            </Form.Select>
          </div>

          <div style={{ margin: "-5px -9px -27px -16px" }} className="pb-5">
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={290}
              />
            )}
          </div>

          <div>
            <div className="d-flex gap-2 align-items-center">
              <div className="d-flex">
                <div
                  className="text-center rounded-1"
                  style={{
                    backgroundColor: "#DAEBFF",
                    width: "42px",
                    height: "42px",
                    lineHeight: "42px",
                  }}
                >
                  <Image
                    src="/images/boys.svg"
                    alt="boys"
                    width={30}
                    height={30}
                  />
                </div>
                <div className="ms-2">
                  <span className="d-block">Boys</span>
                  <h3 className="fs-20 fw-semibold mb-0">980</h3>
                </div>
              </div>

              <div className="d-flex ms-5">
                <div
                  className="text-center rounded-1"
                  style={{
                    backgroundColor: "#FFE8D4",
                    width: "42px",
                    height: "42px",
                    lineHeight: "42px",
                  }}
                >
                  <Image
                    src="/images/girls.svg"
                    alt="girls"
                    width={30}
                    height={30}
                  />
                </div>
                <div className="ms-2">
                  <span className="d-block">Girls</span>
                  <h3 className="fs-20 fw-semibold mb-0">675</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </Card>
    </>
  );
};

export default StudentsOverview;
