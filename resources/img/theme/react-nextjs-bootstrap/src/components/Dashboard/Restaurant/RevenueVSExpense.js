"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const RevenueVSExpense = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const categories = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"]; // Define categories

  const series = [
    { name: "Revenue", data: [5, 7, 8, 6, 9, 10, 7] },
    { name: "Expense", data: [4, 6, 7, 5, 8, 9, 6] },
  ];

  const options = {
    chart: {
      toolbar: { show: false },
    },
    colors: ["#FFAA72", "#90C7FF"],
    plotOptions: {
      bar: {
        borderRadius: 5,
        horizontal: false,
        columnWidth: "50%",
        borderRadiusApplication: "end",
        borderRadiusWhenStacked: "all",
      },
    },
    dataLabels: { enabled: false },
    stroke: { width: 5, show: true, colors: ["transparent"] },
    grid: { show: true, borderColor: "#ECF0FF" },
    xaxis: {
      categories: categories,
      axisTicks: { show: true, color: "#DDE4FF" },
      axisBorder: { show: true, color: "#DDE4FF" },
      labels: {
        show: true,
        style: { colors: "#8695AA", fontSize: "12px" },
      },
    },
    yaxis: {
      min: 0,
      labels: {
        formatter: (val) => "$" + val + "k",
        style: { colors: "#8695AA", fontSize: "12px" },
      },
      axisBorder: { show: false, color: "#DDE4FF" },
      axisTicks: { show: false, color: "#DDE4FF" },
    },
    tooltip: {
      y: { formatter: (val) => "$" + val + "k" },
    },
    legend: {
      show: true,
      position: "bottom",
      fontSize: "12px",
      horizontalAlign: "center",
      itemMargin: { horizontal: 8, vertical: 10 },
      labels: { colors: "#64748B" },
      markers: { size: 7, offsetX: -2, offsetY: -0.5, shape: "diamond" },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <div className="card-body p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-20">
            <h3 className="mb-0 text-secondary-50">Revenue vs Expense</h3>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-border-color border text-body rounded-2"
              >
                Daily
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Daily
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Weekly
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Monthly
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Yearly
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div style={{ margin: "-24px -10px -27px -18px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={345}
              />
            )}
          </div>
        </div>
      </Card>
    </>
  );
};

export default RevenueVSExpense;
