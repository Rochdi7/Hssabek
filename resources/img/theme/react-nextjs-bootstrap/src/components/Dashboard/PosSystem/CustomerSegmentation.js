"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";
import Image from "next/image";

const CustomerSegmentation = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [1200, 1800];

  const options = {
    labels: ["New Customers", "Returning Customers"],
    colors: ["#3584FC", "#AD63F6"],
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: false,
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
              offsetY: -0,
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
      enabled: false,
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
            Customer Segmentation
          </h3>

          <Dropdown className="action-opt -right-10">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="btn bg-transparent p-0 text-end"
              style={{ fontSize: "inherit" }}
            >
              <i
                className="material-symbols-outlined text-body"
                style={{ fontSize: "20px" }}
              >
                more_vert
              </i>
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

        <Card.Body className="bg-white p-4 rounded-3 border-top">
          <div style={{ margin: "0" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="donut"
                height={213}
              />
            )}
          </div>

          <div className="last-child-none mt-4">
            <div className="d-flex align-items-center child mb-4">
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
                    src="/images/new-customers-icon.svg"
                    alt="new-customers-icon"
                    width={24}
                    height={24}
                  />
                </div>
              </div>
              <div className="flex-grow-1 ms-10">
                <span>New Customers</span>
                <h3 className="fs-20 fw-medium mb-0">
                  1,200{" "}
                  <span className="fs-12 fw-normal text-body">
                    <span className="fw-medium">+40%</span> of total
                    transactions
                  </span>
                </h3>
              </div>
            </div>

            <div className="d-flex align-items-center child mb-4">
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
                    src="/images/returning-customers-icon.svg"
                    alt="returning-customers-icon"
                    width={24}
                    height={24}
                  />
                </div>
              </div>
              <div className="flex-grow-1 ms-10">
                <span>Returning Customers</span>
                <h3 className="fs-20 fw-medium mb-0">
                  1,800{" "}
                  <span className="fs-12 fw-normal text-body">
                    <span className="fw-medium">+60%</span> of total
                    transactions
                  </span>
                </h3>
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default CustomerSegmentation;
