"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const NewAdmissions = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [455, 375, 220, 180, 45];

  const options = {
    labels: ["Mathematics", "English", "History", "Art", "Music"],
    colors: ["#37D80A", "#FF4023", "#605DFF", "#AD63F6", "#90C7FF"],
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
      lineCap: "round",
    },
    legend: {
      show: false,
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
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
        donut: {
          size: "80%",
          labels: {
            show: true,
            name: {
              color: "#64748B",
            },
            value: {
              show: true,
              color: "#64748B",
              fontSize: "24px",
              fontWeight: "600",
              offsetY: 1,
            },
            total: {
              show: true,
              color: "#64748B",
              fontSize: "14px",
              fontWeight: "400",
            },
          },
        },
      },
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      enabled: true,
    },
  };

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="custom-padding-30">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-5">
            <h3 className="mb-0">New Admissions</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0 ms-e-10"
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
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">calendar_today</i>
                  Last 1 Year
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">bar_chart</i>
                  All Time
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">visibility</i>
                  View
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">delete</i>
                  Delete
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div style={{ margin: "-15px 0 -15px 0" }} className="t-chart">
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="donut"
                height={250}
              />
            )}
          </div>

          <div className="d-flex flex-wrap gap-3 justify-content-center mt-5">
            <div className="d-flex align-items-center">
              <span
                className="d-inline-block rounded-circle bg-success"
                style={{ width: "11px", height: "11px" }}
              ></span>
              <span className="ms-2">
                Mathematics: <span className="fw-semibold">455</span>
              </span>
            </div>

            <div className="d-flex align-items-center">
              <span
                className="d-inline-block rounded-circle bg-danger"
                style={{ width: "11px", height: "11px" }}
              ></span>
              <span className="ms-2">
                English: <span className="fw-semibold">375</span>
              </span>
            </div>

            <div className="d-flex align-items-center">
              <span
                className="d-inline-block rounded-circle bg-primary-div"
                style={{ width: "11px", height: "11px" }}
              ></span>
              <span className="ms-2">
                History: <span className="fw-semibold">220</span>
              </span>
            </div>

            <div className="d-flex align-items-center">
              <span
                className="d-inline-block rounded-circle bg-primary"
                style={{ width: "11px", height: "11px" }}
              ></span>
              <span className="ms-2">
                Art: <span className="fw-semibold">180</span>
              </span>
            </div>

            <div className="d-flex align-items-center">
              <span
                className="d-inline-block rounded-circle bg-info bg-opacity-50"
                style={{ width: "11px", height: "11px" }}
              ></span>
              <span className="ms-2">
                Music: <span className="fw-semibold">45</span>
              </span>
            </div>
          </div>
        </div>
      </Card>
    </>
  );
};

export default NewAdmissions;
