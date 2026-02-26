"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown, Button } from "react-bootstrap";
import Image from "next/image";

const AgentAvgEarnings = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Earnings",
      data: [20, 40, 60, 60, 50, 30, 40, 30, 40, 40, 60, 60],
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
    colors: ["#9135E8"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "stepline", //curve: ['straight', 'smooth', 'monotoneCubic', 'stepline']
      width: 3,
      lineCap: "10",
    },
    grid: {
      borderColor: "#ECF0FF",
      strokeDashArray: 10,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0,
        opacityTo: 0.8,
      },
    },
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
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
      tickAmount: 4,
      show: false,
      max: 80,
      min: 0,
      labels: {
        formatter: (val) => {
          return "$" + val + "K";
        },
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
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <h3 className="mb-0">Agent Avg. Earnings</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0 ms-e-10"
              >
                <i className="material-symbols-outlined">more_vert</i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">This Day</Dropdown.Item>
                <Dropdown.Item href="#">This Week</Dropdown.Item>
                <Dropdown.Item href="#">This Month</Dropdown.Item>
                <Dropdown.Item href="#">This Year</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div className="d-flex align-items-center gap-3">
            <Button
              className="rounded-1 bg-primary text-white border-0"
              type="button"
              style={{
                padding: "3px 10px",
              }}
            >
              1d
            </Button>

            <Button
              className="rounded-1 border-0 text-body hover-text-white"
              variant="outline-primary"
              onMouseEnter={(e) =>
                e.target.classList.add("bg-primary", "text-white")
              }
              onMouseLeave={(e) =>
                e.target.classList.remove("bg-primary", "text-white")
              }
              style={{
                padding: "3px 10px",
              }}
            >
              15d
            </Button>

            <Button
              className="rounded-1 border-0 text-body hover-text-white"
              variant="outline-primary"
              onMouseEnter={(e) =>
                e.target.classList.add("bg-primary", "text-white")
              }
              onMouseLeave={(e) =>
                e.target.classList.remove("bg-primary", "text-white")
              }
              style={{
                padding: "3px 10px",
              }}
            >
              1m
            </Button>

            <Button
              className="rounded-1 border-0 text-body hover-text-white"
              variant="outline-primary"
              onMouseEnter={(e) =>
                e.target.classList.add("bg-primary", "text-white")
              }
              onMouseLeave={(e) =>
                e.target.classList.remove("bg-primary", "text-white")
              }
              style={{
                padding: "3px 10px",
              }}
            >
              6m
            </Button>

            <Button
              className="rounded-1 border-0 text-body hover-text-white"
              variant="outline-primary"
              onMouseEnter={(e) =>
                e.target.classList.add("bg-primary", "text-white")
              }
              onMouseLeave={(e) =>
                e.target.classList.remove("bg-primary", "text-white")
              }
              style={{
                padding: "3px 10px",
              }}
            >
              1y
            </Button>
          </div>

          <div style={{}}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={244}
              />
            )}
          </div>

          <div className="d-flex align-items-center position-relative justify-content-between">
            <div className="d-flex align-items-center">
              <div className="flex-shrink-0">
                <div
                  className="bg-body-bg border text-center rounded-2"
                  style={{ width: "48px", height: "48px", lineHeight: "48px" }}
                >
                  <Image
                    src="/images/agent-avg-earnings.svg"
                    alt="agent-avg-earnings"
                    width={26}
                    height={26}
                  />
                </div>
              </div>
              <div className="flex-grow-1 ms-3">
                <h3 className="fs-28 fw-semibold text-secondary mb-0">
                  $2,534
                </h3>
                <span className="text-body d-block">Last month earning</span>
              </div>
            </div>

            <span className="d-flex align-items-center align-items-center text-body">
              <i className="material-symbols-outlined fs-18 pe-2 text-success">
                trending_up
              </i>
              <span className="fw-medium me-1 text-secondary">+8.7%</span>
            </span>
          </div>
        </div>
      </Card>
    </>
  );
};

export default AgentAvgEarnings;
