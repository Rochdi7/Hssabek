"use client";

import React, { useEffect, useState } from "react";
import { Dropdown } from "react-bootstrap";

const TodaysEarnings = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Today’s Earnings",
      data: [
        100, 130, 115, 170, 110, 120, 85, 140, 150, 100, 110, 90, 160, 125, 105,
        130, 145, 120, 150, 155, 220, 165,
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
      curve: "smooth", // ['straight', 'smooth', 'monotoneCubic', 'stepline']
      width: 1,
    },
    colors: ["#9135E8"],
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 100, 100],
        shadeIntensity: 1,
        opacityFrom: 0.5,
        opacityTo: 0.6,
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
        "18 Jan",
        "19 Jan",
        "20 Jan",
        "21 Jan",
        "22 Jan",
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
          fontFamily: "Inter",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      show: false,
      max: 250,
      min: 0,
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
          fontFamily: "Inter",
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
    tooltip: {
      enabled: true,
      y: {
        formatter: (val) => {
          return "$" + val / 1 + "";
        },
      },
    },
  };

  return (
    <>
      <div className="card custom-shadow rounded-3 bg-white border mb-4">
        <div className="overflow-hidden rounded-3">
          <div
            className="d-flex justify-content-between align-items-start flex-wrap gap-1 custom-padding-30 pb-4 position-relative z-1"
            style={{
              top: "-5px",
            }}
          >
            <div className="">
              <div className="d-flex align-items-center">
                <h3 className="fs-20 fw-semibold mb-0 pe-2">$3,425.78</h3>
                <span
                  className="text-success-50 px-2 d-inline-block rounded-1 ms-0 fs-12"
                  style={{
                    backgroundColor: "#D8FFC8",
                    padding: "0.5px 0",
                  }}
                >
                  +9.1%
                </span>
              </div>
              <span>Today’s Earnings</span>
            </div>

            <Dropdown className="action-opt -right-10">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <i className="material-symbols-outlined">more_vert</i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">schedule</i>
                  Today
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">pie_chart</i>
                  Last 7 Days
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">refresh</i>
                  Last Month
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div style={{ margin: "-53px -11px -35px -13px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={164}
              />
            )}
          </div>
        </div>
      </div>
    </>
  );
};

export default TodaysEarnings;
