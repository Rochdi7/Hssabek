"use client";

import React, { useEffect } from "react";
import * as echarts from "echarts";
import { Card } from "react-bootstrap";

const IncomeSource = () => {
  useEffect(() => {
    const chartDom = document.getElementById("income_source");
    if (chartDom) {
      const myChart = echarts.init(chartDom);

      const option = {
        legend: {
          bottom: "0",
          left: "center",
          itemWidth: 10,
          itemHeight: 10,
          textStyle: {
            fontSize: 12,
            color: "#fff", // Adjust this for dark/light theme
          },
        },
        toolbox: {
          show: false,
          feature: {
            mark: { show: true },
            dataView: { show: true, readOnly: false },
            restore: { show: true },
            saveAsImage: { show: true },
          },
        },
        color: ["#3584FC", "#FD5812", "#3584FC", "#FD5812"],
        series: [
          {
            name: "Income Source",
            type: "pie",
            radius: [15, 70],
            center: ["50%", "50%"],
            roseType: "area",
            itemStyle: {
              borderRadius: 8,
            },
            data: [
              { value: 40, name: "Product Sales" },
              { value: 15, name: "Investments" },
              { value: 35, name: "Salary" },
              { value: 20, name: "Consulting" },
            ],
          },
        ],
      };

      myChart.setOption(option);

      // Cleanup the chart instance on unmount
      return () => {
        myChart.dispose();
      };
    }
  }, []);

  return (
    <>
      <Card
        className="border-0 rounded-3 mb-4"
        style={{
          background: "linear-gradient(120deg, #343A46 0%, #23272E 99.29%)",
        }}
      >
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-2 mb-4">
            <h3 className="fs-18 mb-0 text-white">Income Source</h3>
            <span className="fs-12 text-white">Last 30 days</span>
          </div>

          <div style={{ margin: "-51px 0 -5px 0" }}>
            <div
              id="income_source"
              style={{ width: "100%", height: "250px" }}
            />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default IncomeSource;
